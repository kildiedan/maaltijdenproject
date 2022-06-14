<?php

use App\Http\Controllers\CategoryContoller;
use App\Http\Controllers\IngredientsController;
use App\Http\Controllers\MealContoller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('ingredients', [IngredientsController::class, 'index']);
Route::post('ingredients', [IngredientsController::class, 'store']);
Route::post('remove-ingredient', [IngredientsController::class, 'delete']);

Route::get('category', [CategoryContoller::class, 'index']);

Route::get('meals', [MealContoller::class, 'index']);
Route::post('meals', [MealContoller::class, 'store']);
Route::post('remove-meal', [MealContoller::class, 'delete']);
