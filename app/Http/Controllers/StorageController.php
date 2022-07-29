<?php

namespace App\Http\Controllers;

use App\Models\user_ingredient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StorageController extends Controller
{
    public function index()
    {
        $user_ingredient = user_ingredient::all();
        return $user_ingredient;
    }
    public function store(Request $request)
    {
        $validated = $this->validate($request, [
            'ingredient_id' => 'required',
            'amount' => 'required',
            'user_id' => 'required',
        ]);

        $storage = user_ingredient::create([
            'ingredient_id' => $validated['ingredient_id'],
            'amount' => $validated['amount'],
            'user_id' => $validated['user_id'],

        ]);
        $user_ingredient = user_ingredient::all();
        return $user_ingredient;
    }
    public function delete(Request $request)
    {
        $meal = user_ingredient::findOrFail($request->id)->delete();
        return user_ingredient::all();
    }
}
