<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DirectoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\SavedController;

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

Route::post('/saved/{brand}', [SavedController::class, 'store'])->name('saved.store');
Route::delete('/saved/{brand}', [SavedController::class, 'destroy'])->name('saved.destroy');
Route::get('/saved', [SavedController::class, 'index'])->name('saved.index');