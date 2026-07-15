<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/', [BookController::class, 'index']);
Route::post('/', [BookController::class, 'store']);
Route::delete('/{book}', [BookController::class, 'destroy']);
