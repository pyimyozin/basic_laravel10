<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\SupervisorController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\RoleController;




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
    return view('front.dashboard-three');
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

Route::post('/users', [UserController::class, 'store'])->name('user#store');

// Route::get('/registration', [UserController::class, 'registration'])->name('user#registration');

// Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');

// Route::post('/login', [UserController::class, 'login']);

// Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::fallback(function () {
    return view('404');
});
Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){

    Route::get('/normal_users',[HomeController::class, 'index'])->name('home#index');

    Route::get('/users', [UserController::class, 'index'])->name('users#index');

    Route::get('/managers', [ManagerController::class, 'index'])->name('managers#index');

    Route::get('/supervisors', [SupervisorController::class, 'index'])->name('supervisors#index');

    Route::get('/staffs', [StaffController::class, 'index'])->name('staffs#index');

    Route::get('/roles', [RoleController::class, 'index'])->name('Roles#index');

});



