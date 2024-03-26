<?php

namespace App\Http\Controllers\AdminDashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Team;
use App\Models\Category;
use App\Models\MatchDay;
class MatchDayController extends Controller
{
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

        $matchDay = MatchDay::create([
            'date' => $date,
            'venue_id' => $venueId,
        ]);

        foreach ($categories as $category) {
            $teams = Team::where('category_id', $category)->get();

            $teams = $teams->shuffle();

            $isEven = $teams->count() % 2 === 0;

            if ($isEven) {

                $halfCount = $teams->count() / 2;
                $firstHalf = $teams->slice(0, $halfCount);
                $secondHalf = $teams->slice($halfCount);

                for ($i = 0; $i < count($firstHalf); $i++) {
                    $matches[] = [
                        'team1' => $firstHalf[$i],
                        'team2' => $secondHalf[$i + 3]
                    ];
                }

                foreach ($matches as $match) {
                    Game::create([
                        'match_day_id' => $matchDay->id,
                        'team_1_id' => $match['team1']->id,
                        'team_2_id' => $match['team2']->id,
                    ]);
                }

                $matches = [];

                $lastItem = $firstHalf->pop();
                $firstHalf->prepend($lastItem);

                for ($i = 0; $i < count($firstHalf); $i++) {
                    $matches[] = [
                        'team1' => $firstHalf[$i],
                        'team2' => $secondHalf[$i + 3]
                    ];
                }

                foreach ($matches as $match) {
                    Game::create([
                        'match_day_id' => $matchDay->id,
                        'team_1_id' => $match['team1']->id,
                        'team_2_id' => $match['team2']->id,
                    ]);
                }

            } else {

                $categoryName = Category::find($category)->name;
                return redirect()->back()->with('error', 'Ungerade Anzahl an Teams in Kategorie:' . ' ' . $categoryName);

            }

        }

        return redirect()->back()->with('success', 'Spieltag erfolgreich erstellt.');
    }
}
