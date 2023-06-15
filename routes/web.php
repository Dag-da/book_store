<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
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

Route::get('/', [BookController::class, 'index'])->name('home');

Route::prefix('auteur')->name('author.')->controller(AuthorController::class)->group(function () {
    Route::post('/search', 'search')->name('search');
});

Route::prefix('livre')->name('book.')->controller(BookController::class)->group(function () {
    Route::get('/ajouter', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/{book}', 'show')->name('show');
    Route::get('/editer/{book}', 'edit')->name('edit');
    Route::patch('/update/{book}', 'update')->name('update');
    Route::get('/delete/{book}', 'destroy')->name('destroy');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
