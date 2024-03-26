<?php

namespace App\Http\Controllers\AdminDashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Category;


class TeamController extends Controller
{
    public function createTeam()
    {
        $categories = Category::all();
        return view('admin.createTeam', compact('categories'));
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

}
