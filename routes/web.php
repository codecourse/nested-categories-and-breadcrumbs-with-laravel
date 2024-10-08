<?php

use App\Http\Controllers\CategoryIndexController;
use App\Http\Controllers\CategoryShowController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/categories', CategoryIndexController::class)
    ->middleware(['auth', 'verified'])
    ->name('categories');

Route::get('/categories/{categoryFromPath}', CategoryShowController::class)
    ->where('categoryFromPath', '.*')
    ->middleware(['auth', 'verified'])
    ->name('categories.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
