<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LinkController;

Route::get('/', function () {
    return view('welcome');
});

// 2. Принять длинную ссылку из формы (метод POST)
Route::post('/shorten', [LinkController::class, 'store']);

// 3. Редирект с короткого кода на длинную ссылку (чуть позже напишем метод redirect)
Route::get('/{code}', [LinkController::class, 'redirect']);
