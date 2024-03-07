<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Team;

class GameOperationController extends Controller
{
    public function index($league)
    {
        $teams = $this->getDataForLeague($league);
        $categories = Category::pluck('name')->toArray();
        return view('gameoperation', compact('league', 'teams', 'categories'));
    }

    private function getDataForLeague($league)
    {
        return Category::where('name', $league)->firstOrFail()->teams;
    }
}
