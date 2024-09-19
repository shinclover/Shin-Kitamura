<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\Category;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function create()
    {
        $categories = Category::all(); // カテゴリーのリストを取得
        return view('recipes.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'ingredients' => 'required|string',
            'instructions' => 'required|string',
            'category_id' => 'required|exists:categories,id', // カテゴリーIDを検証
        ]);

        Recipe::create($request->all());

        return redirect()->route('recipes.index');
    }
}
