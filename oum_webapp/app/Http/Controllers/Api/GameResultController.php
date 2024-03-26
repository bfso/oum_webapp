<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Team;

class GameResultController extends Controller
{
    public function updateResult($id, Request $request)
    {
        $game = Game::find($id);

        if (!$game) {
            return response()->json([
                'message' => 'Spiel nicht gefunden',
                'code' => 404
            ], 404);
        }

        // Ergebnis des Spiels aktualisieren
        $game->update([
            'team_1_score' => $request->team_1_score,
            'team_2_score' => $request->team_2_score,
        ]);

        // Spielinformationen abrufen
        $team1Id = $game->team_1_id;
        $team2Id = $game->team_2_id;
        $team1Score = $game->team_1_score;
        $team2Score = $game->team_2_score;

        // Teams abrufen
        $team1 = Team::find($team1Id);
        $team2 = Team::find($team2Id);

        // Punkte berechnen und Teams aktualisieren
        if ($team1Score > $team2Score) {
            $team1->wins += 1;
            $team2->loses += 1;
            $team1->points += 3;
        } elseif ($team1Score < $team2Score) {
            $team1->loses += 1;
            $team2->wins += 1;
            $team2->points += 3;
        } else {
            $team1->draws += 1;
            $team2->draws += 1;
            $team1->points += 1;
            $team2->points += 1;
        }

        // Weitere Statistiken aktualisieren
        $team1->games += 1;
        $team1->goals += $team1Score;
        $team1->goals_conceded += $team2Score;

        $team2->games += 1;
        $team2->goals += $team2Score;
        $team2->goals_conceded += $team1Score;

        // Teams speichern
        $team1->save();
        $team2->save();

        return response()->json([
            'message' => 'Ergebnis erfolgreich aktualisiert und Teams aktualisiert',
            'code' => 200
        ], 200);
    }
}