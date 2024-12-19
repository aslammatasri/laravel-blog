<?php

use App\Http\Controllers\PostController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//PostController routes
Route::get('/home', [PostController::class, 'index'])->name('home');
Route::get('/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/create', [PostController::class, 'store'])->name('posts.store');
Route::get('users/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::put('/users/{id}', [PostController::class, 'update'])->name('posts.update');
Route::delete('/users/{id}', [PostController::class, 'destroy'])->name('posts.destroy');


// Route::resource('posts', PostController::class); 
