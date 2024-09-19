<?php


use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\UsersController;




Route::get('/', [PostController::class, 'index']);
Route::get('/recipes', [PostController::class, 'index'])->name('recipes.index');
Route::resource('categories', CategoryController::class);
Route::resource('recipes', RecipeController::class);
Route::get('/serch',[UsersController::class, 'serch']);
Route::get('/users', [UsersController::class, 'index']);


