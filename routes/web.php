<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('authors', AuthorController::class)
    ->only(['index', 'create', 'store', 'show']);

Route::resource('books', BookController::class)
    ->only(['index', 'create', 'store', 'show']);