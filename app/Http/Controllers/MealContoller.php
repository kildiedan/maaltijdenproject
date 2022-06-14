<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use Illuminate\Http\Request;

class MealContoller extends Controller
{
    public function index()
    {
        $meals = Meal::all();
        return $meals;
    }
    public function store(Request $request)
    {
        $validated = $this->validate($request, [
            'name' => 'required|unique:meals,name',
            'recipe' => 'required',
            'chosen' => 'required',
        ]);

        $meal = Meal::create([
            'name' => $validated['name'],
            'recipe' => $validated['recipe'],
            'chosen' => $validated['chosen'],
        ]);
    }
    public function delete(Request $request)
    {
        $meal = Meal::findOrFail($request->id)->delete();
        return Meal::all();
    }
}
