<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\DirectoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\SavedController;
use App\Http\Controllers\SettingsController;

Route::get('/', function () {
    return view('welcome');
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

Route::get('/settings', function () {
    return view('settings');
})->name('settings');

Route::post('/settings/toggle', function (Request $request) {
    session([
        'dark_mode' => $request->has('dark_mode'),
    ]);

    return redirect()->back();
})->name('toggle.mode');

Route::post('/settings/language-toggle', function (Request $request) {
    session([
        'locale' => $request->has('language') ? 'ms' : 'en',
    ]);

    return redirect()->back();
})->name('language.toggle');

Route::post('/settings/permission', [SettingsController::class, 'savePermission'])
    ->name('settings.permission');
