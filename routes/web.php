<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;


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

Route::get('/posts/create', [PostController::class, 'create']);

Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('post#edit');

Route::put('/posts/{id}', [PostController::class, 'update'])->name('post#update');

Route::delete('/posts/{id}',[PostController::class, 'destroy'])->name('post#destory');

Route::get('/posts/{id}', [PostController::class, 'show'])->name('post#show');

Route::post('/posts/{id}',[PostController::class, 'show'])->name('post#show');

Route::get('/search', [PostController::class, 'search'])->name('posts.search');
