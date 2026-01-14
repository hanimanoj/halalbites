<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\DirectoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\SavedController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/directory', [DirectoryController::class, 'index'])
    ->name('directory.index');

Route::get('/directory/category/{slug}', [DirectoryController::class, 'category'])
    ->name('directory.category');

Route::get('/directory/{brand:slug}', [DirectoryController::class, 'show'])
    ->name('directory.show');

Route::get('/saved', [SavedController::class, 'index'])->name('saved-pages');
Route::post('/saved/{brand}', [SavedController::class, 'store'])->name('saved.store');
Route::delete('/saved/{id}', [SavedController::class, 'destroy'])->name('saved.destroy');


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

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

Route::get('/signup', [AuthController::class, 'showSignup'])->name('signup');
Route::post('/signup', [AuthController::class, 'signup'])->name('signup.submit');

Route::get('/profile', [AuthController::class, 'profile'])
    ->name('profile');

Route::get('/profile/edit', [AuthController::class, 'editProfile'])->name('profile.edit');
Route::post('/profile/update', [AuthController::class, 'updateProfile'])->name('profile.update');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/brand/{brand}/toggle-save',
    [BrandController::class, 'toggleSave']
)->name('brand.toggleSave');