<?php

use App\Http\Controllers\LinkController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LinkController::class, 'index'])->name('home');

Route::post('/links', [LinkController::class, 'store'])
    ->middleware('throttle:shorten_links')
    ->name('links.store');


Route::get('/dashboard', [LinkController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::delete('/links/{link}', [LinkController::class, 'destroy'])
    ->middleware(['auth'])
    ->name('links.destroy');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/{link:short_code}', [LinkController::class, 'redirect'])->name('links.show');
