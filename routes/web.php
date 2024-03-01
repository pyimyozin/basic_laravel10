<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;



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
    return view('welcome');
});

Route::get('/posts', [PostController::class, 'index'])->name('post#index');

Route::post('/posts', [PostController::class, 'store'])->name('post#store');

Route::get('/posts/create', [PostController::class, 'create'])->name('post#create');

Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('post#edit');

Route::put('/posts/{id}', [PostController::class, 'update'])->name('post#update');

Route::delete('/posts/{id}',[PostController::class, 'destroy'])->name('post#destory');

Route::get('/posts/{id}', [PostController::class, 'show'])->name('post#show');

Route::post('/posts/{id}',[PostController::class, 'show'])->name('post#show');

Route::get('/search', [PostController::class, 'search'])->name('posts#search');

Route::get('/clear-search', [PostController::class, 'clearSearch'])->name('clear#search');

Route::get('/users', [UserController::class, 'index'])->name('users#index');

Route::post('/users', [UserController::class, 'store'])->name('user#store');

Route::get('/registration', [UserController::class, 'registration'])->name('user#registration');

Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');

Route::post('/login', [UserController::class, 'login']);

Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::fallback(function () {
    return view('404');
});