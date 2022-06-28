<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CategoryContoller;
use App\Http\Controllers\IngredientsController;
use App\Http\Controllers\MealContoller;
use App\Http\Controllers\StorageController;
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

Route::get('ingredients', [IngredientsController::class, 'index']);
Route::post('ingredients', [IngredientsController::class, 'store']);
Route::post('remove-ingredient', [IngredientsController::class, 'delete']);


Route::get('category', [CategoryContoller::class, 'index']);

Route::get('meals', [MealContoller::class, 'index']);
Route::post('meals', [MealContoller::class, 'store']);
Route::post('remove-meal', [MealContoller::class, 'delete']);
Route::post('meal_ingredient', [MealContoller::class, 'add']);
Route::post('meal_top', [MealContoller::class, 'meal_top']);

Route::post('login', [AuthenticatedSessionController::class, 'store']);
Route::get('logout', [AuthenticatedSessionController::class, 'destroy']);
Route::post('register', [RegisteredUserController::class, 'store'])->middleware('guest');
Route::get('me', [AuthenticatedSessionController::class, 'me'])->middleware('auth');

Route::post('storage', [StorageController::class, 'store']);
Route::get('user_ingrdients', [StorageController::class, 'index']);
