<?php

namespace App\Http\Controllers;

use App\Models\ingredient_meal;
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

        $meals = Meal::all();
        return $meals;
    }
    public function delete(Request $request)
    {
        $meal = Meal::findOrFail($request->id)->delete();
        return Meal::all();
    }
    public function add(Request $request)
    {
        $validated = $this->validate($request, [
            'meal_id' => 'required',
            'ingredient_id' => 'required',
            'amount' => 'required',
        ]);

        $recepie = ingredient_meal::create([
            'meal_id' => $validated['meal_id'],
            'ingredient_id' => $validated['ingredient_id'],
            'amount' => $validated['amount'],
        ]);

        $meal_ingredient = ingredient_meal::all();
        return $meal_ingredient;
    }
    public function meal_top()
    {
        $meals = Meal::orderby('chosen', 'desc')->limit(5)->get();
        return $meals;
    }

    public function meal_recipe()
    {
        $meal_ingredient = ingredient_meal::all();
        return $meal_ingredient;
    }
    public function made(Request $request)
    {
        $meal = meal::findorfail($request->id)->get();
        $chosen = $meal->chosen + 1;
        $meal->chosen = $chosen;
        $meal->save();
        return meal::all();
    }
}
