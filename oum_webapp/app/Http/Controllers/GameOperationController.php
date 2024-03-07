<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Team;

class GameOperationController extends Controller
{
    public function index($league)
    {
        // Daten für die ausgewählte Liga abrufen
        $data = $this->getDataForLeague($league);

        // Daten an das Blade-Template übergeben
        return view('gameoperation', compact('league', 'data'));
    }

    private function getDataForLeague($league)
    {
        // Abhängig von der übergebenen Liga die entsprechenden Daten abrufen
        switch ($league) {
            case 'herrenA':
                // Beispiel: Daten für Herren A aus der Datenbank abrufen
                $category = Category::where('name', 'Herren A')->first();
                $data = $category ? $category->teams : [];
                break;
            case 'herrenB':
                // Beispiel: Daten für Herren B aus der Datenbank abrufen
                $category = Category::where('name', 'Herren B')->first();
                $data = $category ? $category->teams : [];
                break;
            // Weitere Fälle für andere Ligen hinzufügen, falls erforderlich
            default:
                $data = []; // Standardwert, falls Liga nicht erkannt wird
        }

        return $data;
    }
}
