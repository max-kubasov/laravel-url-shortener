<?php

use App\Http\Controllers\LinkController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\Admin\DashboardController;


Route::get('/', [LinkController::class, 'index'])->name('home');
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
});

// Blog Routes
Route::get('/blog', [PostController::class, 'blogIndex'])->name('blog.index');
Route::get('/blog/{post}', [PostController::class, 'showBlog'])->name('blog.show');

Route::get('/news', [PostController::class, 'newsIndex'])->name('news.index');
Route::get('/news/{post}', [PostController::class, 'showNews'])->name('news.show');

// Landing (Solutions) Routes
Route::get('/tools', function () { return view('tools.index'); });
Route::get('/solutions/{landing}', [LandingController::class, 'show'])->name('landings.show');
Route::get('/instagram-bio-link', function () { return view('landings.instagram'); });
Route::get('/tiktok-link-shortener', function () { return view('landings.tiktok'); });
Route::get('/whatsapp-link-generator', function () { return view('landings.whatsapp'); });

Route::post('/links', [LinkController::class, 'store'])
    ->middleware('throttle:shorten_links')
    ->name('links.store');

// Маршрут для генерации и скачивания QR-кода
Route::get('/links/{link:short_code}/qr/{format}', [LinkController::class, 'downloadQr'])
    ->name('links.qr')
    ->where('format', 'png|svg')
    ->middleware('auth'); // Только для залогиненных


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
