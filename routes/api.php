<?php

use App\Http\Controllers\API\RestaurantController;
use App\Models\Category;
use App\Models\Dish;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/restaurants', [Restaurant::class], 'index');
Route::get('/restaurants/{restaurant}',[Restaurant::class, 'show']);

Route::get('/dishes', [Dish::class], 'index');
Route::get('/dishes/{dish}',[Dish::class, 'show']);

Route::get('/categories', [Category::class], 'index');
Route::get('/categories/{category}',[Category::class, 'show']);

Route::get('/restaurants/search', [RestaurantController::class, 'search'])->name('restaurants.search');