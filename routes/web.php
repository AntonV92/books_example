<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/books/export/{page}', [BookController::class, 'export'])->name('books.export');
Route::resource('books', BookController::class);
