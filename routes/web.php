<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('authors', AuthorController::class)
    ->only([
            // READ
            'index', 'show',
            // CREATE
            'create', 'store',
            // UPDATE
            'edit', 'update',
            // DELETE
            'destroy'
            ]);

Route::resource('books', BookController::class)
    ->only([
            // READ
            'index', 'show',
            // CREATE
            'create', 'store',
            // UPDATE
            'edit', 'update',
            // DELETE
            'destroy'
            ]);