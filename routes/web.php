<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Models\Book;

Route::get('/', function () {
    return view('welcome');
});

// Author Routes
Route::prefix('author')->group(function() {
    
    Route::get('/', [AuthorController::class, 'index']);
    
    Route::get('/create', [AuthorController::class, 'create']);

    Route::get('/{id}', [AuthorController::class, 'show']);
    
    
    Route::post('/{id}', [AuthorController::class, 'store']);

});

// Book Routes
Route::prefix('book')->group(function() {
    
    Route::get('/', [BookController::class, 'index']);

    Route::get('/create', [BookController::class, 'create']);

    Route::get('/{id}', [BookController::class, 'show']);
    
    Route::post('/{id}', [BookController::class, 'store']);

});