<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Player;
use Illuminate\Http\Request;
use App\Models\Team;

class AdminController extends Controller
{
    public function storeCategory(Request $request)
    {
        // Validierung der Eingabe
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Überprüfe, ob die Kategorie bereits existiert
        $existingCategory = Category::where('name', $request->name)->first();

        if ($existingCategory) {
            // Kategorie existiert bereits
            return redirect()->back()->with('error', 'Die Kategorie existiert bereits.');
        }

        // Neue Kategorie erstellen und in der Datenbank speichern
        Category::create([
            'name' => $request->name,
        ]);

        // Weiterleitung nach erfolgreicher Erstellung
        return redirect()->route('edit')->with('success', 'Kategorie erfolgreich erstellt.');
    }

    public function createPlayer()
    {
        return view('admin.createPlayer');
    }

    public function storePlayer(Request $request)
    {
        // Validierung der Eingabe
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            // Füge hier weitere Validierungsregeln für Spielerdetails hinzu
        ]);

        // Spieler erstellen und in der Datenbank speichern
        Player::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            // Füge hier weitere Spielerdetails hinzu
        ]);

        // Weiterleitung nach erfolgreicher Erstellung
        return redirect()->route('admin.dashboard')->with('success', 'Spieler erfolgreich erstellt.');
    }
}
