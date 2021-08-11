<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\UserPostController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;

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
//home
Route::get('/',function(){
    return view('home');
} )->name('home');

//dashboard

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

//users show
Route::get('/users/{user:username}/posts', [UserPostController::class, 'index'])->name('users.posts');

//logout
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

//login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

//register
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

//post
Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::post('/posts', [PostController::class, 'store']);
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

//postslike controller
Route::post('/posts/{post}/likes', [PostLikeController::class, 'store'])->name('posts.likes');

//delete the likes
Route::delete('/posts/{post}/likes', [PostLikeController::class, 'destroy'])->name('posts.likes');




