<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Team;
use App\Models\Venue;


class AdminController extends Controller
{
    public function index()
    {
        $teams = Team::all();
        $categories = Category::all();
        $venues = Venue::all();

        return view('edit', compact('teams', 'categories', 'venues'));
    }


    





}