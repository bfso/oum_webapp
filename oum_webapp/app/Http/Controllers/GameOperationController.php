<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GameOperationController extends Controller
{
    public function index($league)
    {
        // Abhängig von der übergebenen Liga holst du die entsprechenden Daten aus der Datenbank
        switch ($league) {
            case 'herrenA':
                $data = HerrenA::all(); // Beispiel: Holen Sie alle Daten für Herren A
                break;
            case 'herrenB':
                $data = HerrenB::all(); // Beispiel: Holen Sie alle Daten für Herren B
                break;
            // Weitere Fälle für andere Ligen hinzufügen, falls erforderlich
            default:
                $data = []; // Standardwert, falls Liga nicht erkannt wird
        }

        // Gib die Daten an die Blade-Vorlage weiter
        return view('gameoperation', ['league' => $league, 'data' => $data]);
    }
    
}

