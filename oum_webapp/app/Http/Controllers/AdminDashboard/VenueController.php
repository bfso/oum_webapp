<?php

namespace App\Http\Controllers\AdminDashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Venue;


class VenueController extends Controller
{
    public function destroyVenue(Venue $venue)
    {
        $venue->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Venue erfolgreich gelöscht.');
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

        return redirect()->back()->with('success', 'Ort erfolgreich erstellt.');
    }
}
