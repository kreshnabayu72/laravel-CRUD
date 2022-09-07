<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\PostController;
use App\http\Controllers\UserController;
use App\Models\Post;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PostController::class,'show_index']);
Route::get('/write', [PostController::class,'show_write']);
Route::get('/login',  [UserController::class,'show_login']);
Route::get('/register', [UserController::class,'show_register']);
Route::get('/admin', [UserController::class,'show_admin']);
Route::get('/edit-user/{user}', [UserController::class,'show_edit_user']);
Route::get('/edit-post/{post}', [PostController::class,'show_edit_post']);

Route::get('/{post}', [PostController::class,'single_post']);

Route::post('/post',[PostController::class,'add_post']);

Route::post('/register',[UserController::class,'post_register']);
Route::post('/login',[UserController::class,'post_login']);
Route::post('/logout',[UserController::class,'post_logout']);

Route::put('/user/{user}',[UserController::class,'edit_user']);
Route::put('/post/{post}',[PostController::class,'edit_post']);

Route::delete("/delete/user/{user}",[UserController::class,'delete_user']);
Route::delete("/delete/post/{post}",[PostController::class,'delete_post']);