<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Player;
use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Venue;
use Illuminate\Support\Str;
use App\Models\Game;
use App\Models\MatchDay;

class AdminController extends Controller
{
    public function storeVenue(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ]);

        Venue::create([
            'name' => $request->name,
            'location' => $request->location,
        ]);

        return redirect()->back()->with('success', 'Ort erfolgreich erstellt.');
    }


    public function index()
    {
        $teams = Team::all();
        $categories = Category::all();
        $venues = Venue::all();

        return view('edit', compact('teams', 'categories', 'venues'));
    }
    public function storeCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $existingCategory = Category::where('name', $request->name)->first();

        if ($existingCategory) {
            return redirect()->back()->with('error', 'Die Kategorie existiert bereits.');
        }

        Category::create([
            'name' => $request->name,
        ]);

        return redirect()->route('edit')->with('success', 'Kategorie erfolgreich erstellt.');
    }

    public function createTeam()
    {
        $categories = Category::all();
        return view('admin.createTeam', compact('categories'));
    }
    public function storePlayer(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'player_nr' => 'required|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif',
            'playing_for' => 'required',
        ]);

        $licenseNr = Str::random(10);

        $existingPlayer = Player::where('license_nr', $licenseNr)->first();

        if ($existingPlayer) {
            return redirect()->back()->with('error', 'Etwas ist mit der Lizenz schiefgelaufen,versuche es erneut.');
        }


        $player = new Player;
        $player->first_name = $request->first_name;
        $player->last_name = $request->last_name;
        $player->player_nr = $request->player_nr;
        $player->license_nr = $licenseNr;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $request->first_name . '_' . $request->last_name . '_' . $licenseNr . '.' . $image->extension();
            $image->move(public_path('player_img'), $imageName);
            $player->image = $imageName;
        }

        $player->playing_for = $request->playing_for;

        $player->save();

        return redirect()->route('edit')->with('success', 'Spieler erfolgreich erstellt.');
    }

    public function storeTeam(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
        ]);

        Team::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('edit')->with('success', 'Team erfolgreich hinzugefügt.');
    }

    public function destroyTeam($id)
    {
        $team = Team::findOrFail($id);
        $team->delete();
        return redirect()->route('edit')->with('success', 'Team erfolgreich gelöscht.');
    }

    public function destroyCategory(Category $category)
    {
        $category->delete();

        return redirect()->route('edit')->with('success', 'Kategorie erfolgreich gelöscht.');
    }

    public function destroyVenue(Venue $venue)
    {
        $venue->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Venue erfolgreich gelöscht.');
    }

    public function generateMatches(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'venue_id' => 'required|exists:venues,id',
            'categories' => 'required|array',
        ]);

        $date = $request->input('date');
        $venueId = $request->input('venue_id');
        $categories = $request->input('categories');

        foreach ($categories as $categoryId) {
            $teams = Team::where('category_id', $categoryId)->get();
            $teamsCount = $teams->count();

            if ($teamsCount < 2) {
                continue;
            }

            $matchDay = MatchDay::create([
                'date' => $date,
                'venue_id' => $venueId,
                'category_id' => $categoryId,
            ]);

            // Erstelle Spiele für jedes Team
            for ($i = 0; $i < $teamsCount; $i++) {
                for ($j = $i + 1; $j < $teamsCount; $j++) {
                    Game::create([
                        'match_day_id' => $matchDay->id,
                        'team_1_id' => $teams[$i]->id,
                        'team_2_id' => $teams[$j]->id,
                    ]);
                }
            }
        }

        return redirect()->back()->with('success', 'Spiele erfolgreich generiert.');
    }


    private function gameExists($matchDayId, $team1Id, $team2Id)
    {
        return Game::where('match_day_id', $matchDayId)
            ->where(function ($query) use ($team1Id, $team2Id) {
                $query->where(function ($q) use ($team1Id, $team2Id) {
                    $q->where('team_1_id', $team1Id)
                        ->where('team_2_id', $team2Id);
                })
                    ->orWhere(function ($q) use ($team1Id, $team2Id) {
                        $q->where('team_1_id', $team2Id)
                            ->where('team_2_id', $team1Id);
                    });
            })
            ->exists();
    }







}