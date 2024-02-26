<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

Route::get('/posts', [PostController::class, 'index']);

Route::post('/posts', [PostController::class, 'store']);

Route::delete('/post/{id}', [PostController::class, 'destroy']);

Route::post('/posts/checkSlug', [PostController::class, 'createSlug']);

Route::get('/post/{id}', [PostController::class, 'show']);

Route::get('/categories', [CategoryController::class, 'index']);
