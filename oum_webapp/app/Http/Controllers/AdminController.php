<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Player;
use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Venue;
use Illuminate\Support\Str;

class AdminController extends Controller
{


    public function edit()
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
        ]);

        $existingPlayer = Player::where('license_nr', $request->player_nr)->first();

        if ($existingPlayer) {
            return redirect()->back()->with('error', 'Ein Spieler mit dieser Lizenznummer existiert bereits.');
        }

        $licenseNr = Str::random(10);

        Player::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'player_nr' => $request->player_nr,
            'license_nr' => $licenseNr,
        ]);

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
        return redirect()->route('edit')->with('success', 'Venue erfolgreich hinzugefügt.');

    }

    public function destroyVenue(Venue $venue)
    {
        $venue->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Venue erfolgreich gelöscht.');
    }

}