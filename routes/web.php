<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
  return view('welcome', ['users'=>[]]);
});

Route::resource('/users', UserController::class);
Route::resource('/posts', PostController::class);
Route::resource('/posts.comments', CommentController::class)->except(['create', 'show', 'index', 'edit']); // ->only(['store','update','destroy'])와 같음