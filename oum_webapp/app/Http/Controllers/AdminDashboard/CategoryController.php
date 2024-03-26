<?php

namespace App\Http\Controllers\AdminDashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;


class CategoryController extends Controller
{
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


    public function destroyCategory(Category $category)
    {
        $category->delete();

        return redirect()->route('edit')->with('success', 'Kategorie erfolgreich gelöscht.');
    }
}
