<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Route::resource('categories',\App\Http\Controllers\CategoryController::class);
    // Route::resource('posts',\App\Http\Controllers\PostController::class);
});

require __DIR__ . '/auth.php';

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');
Route::resource('categories', \App\Http\Controllers\CategoryController::class);
Route::resource('posts', \App\Http\Controllers\PostController::class);
Route::get('posts/{post}', [\App\Http\Controllers\PostController::class, 'show'])->name('posts.show');
