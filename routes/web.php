<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DirectoryController;
use App\Http\Controllers\BrandController;

Route::get('/', function () {
    return redirect()->route('directory.index');
})->name('home');

Route::get('/directory', [DirectoryController::class, 'index'])
    ->name('directory.index');

Route::get('/directory/category/{slug}', [DirectoryController::class, 'category'])
    ->name('directory.category');

Route::get('/directory/{brand:slug}', [DirectoryController::class, 'show'])
    ->name('directory.show');

Route::get('/saved', [SavedController::class, 'index'])
    ->name('saved.index');