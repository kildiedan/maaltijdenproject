<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use Illuminate\Http\Request;

class IngredientsController extends Controller
{
    public function index()
    {
        $ingredients = Ingredient::all();
        return $ingredients;
    }
    public function store(Request $request)
    {
        $validated = $this->validate($request, [
            'name' => 'required|unique:ingredients,name',
            'category' => 'required',
        ]);

        $ingredient = Ingredient::create([
            'name' => $validated['name'],
            'category_id' => $validated['category'],
        ]);
    }

    public function delete(Request $request)
    {
        $Ingredient = Ingredient::findOrFail($request->id)->delete();
        return Ingredient::all();
    }
}
