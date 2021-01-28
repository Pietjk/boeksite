<?php

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

Route::get('/', [App\Http\Controllers\ContentController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::resource('post', App\Http\Controllers\PostsController::class)->except(['show', 'destroy']);
});

Auth::routes(['register' => false]);

// Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
