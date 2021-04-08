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
    // Post routing
    Route::resource('post', App\Http\Controllers\PostsController::class)->except(['show', 'destroy', 'index']);
    // File routing
    // Route::resource('file', App\Http\Controllers\FilesController::class);
    Route::get('/book/{book}/file/create', [App\Http\Controllers\FilesController::class, 'create'])->name('files.create');
    Route::post('/book/{book}/file/store', [App\Http\Controllers\FilesController::class, 'store'])->name('files.store');
    // Book routing
    Route::resource('book', App\Http\Controllers\BooksController::class);
    Route::post('/book/{book}/feature', [App\Http\Controllers\BooksController::class, 'feature'])->name('book.feature');
    route::get('/book/{book}/choice', [App\Http\Controllers\BooksController::class, 'choice'] )->name('book.choice');
});

Auth::routes(['register' => false]);

// Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
