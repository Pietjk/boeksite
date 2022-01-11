<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactFormSubmissionController;
use Spatie\Honeypot\ProtectAgainstSpam;

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

// Home page
Route::get('/', [App\Http\Controllers\ContentController::class, 'home'])->name('home');

// Mail route
Route::post('/send', [App\Http\Controllers\MailController::class, 'send'])->name('send')->middleware(ProtectAgainstSpam::class);

// News page
Route::get('/news/all', [App\Http\Controllers\NewsController::class, 'showAll'])->name('news.showAll');

// Column page
Route::get('/blog/{column}', [App\Http\Controllers\ColumnsController::class, 'show'])->name('column.show');

// Review page
Route::get('/reviewer/{review}', [App\Http\Controllers\ReviewController::class, 'show'])->name('review.show');

Route::middleware('auth')->group(function () {
    // Post routing
    Route::resource('post', App\Http\Controllers\PostsController::class)->except(['show', 'index']);

    // Column routing
    Route::resource('column', App\Http\Controllers\ColumnsController::class)->except(['index', 'show']);

    // News routing
    Route::resource('news', App\Http\Controllers\NewsController::class)->except(['show']);

    // Review routing
    Route::resource('review', App\Http\Controllers\ReviewController::class)->except(['show']);

    // File post routing
    Route::get('/post/{post}/file/create', [App\Http\Controllers\FilesController::class, 'postcreate'])->name('postfiles.create');
    Route::post('/post/{post}/file/store', [App\Http\Controllers\FilesController::class, 'poststore'])->name('postfiles.store');

    // Book routing
    Route::resource('book', App\Http\Controllers\BooksController::class)->except(['show']);
    Route::post('/book/{book}/feature', [App\Http\Controllers\BooksController::class, 'feature'])->name('book.feature');
    route::get('/book/{book}/choice', [App\Http\Controllers\BooksController::class, 'choice'] )->name('book.choice');

    // File book routing
    Route::get('/book/{book}/file/create', [App\Http\Controllers\FilesController::class, 'bookcreate'])->name('files.create');
    Route::post('/book/{book}/file/store', [App\Http\Controllers\FilesController::class, 'bookstore'])->name('files.store');
    Route::post('/book/{book}/pdf/store', [App\Http\Controllers\FilesController::class, 'pdfstore'])->name('pdfs.store');
});

Auth::routes(['register' => false]);
