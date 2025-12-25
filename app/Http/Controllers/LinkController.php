<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LinkController extends Controller
{
    public function store(Request $request)
    {
        // 1. Валидация (проверяем, что пришла ссылка)
        $request->validate(['url' => 'required|url']);

        // 2. Создаем запись в базе
        $link = Link::create([
            'original_url' => $request->url,
            'short_code' => Str::random(6) // Генерируем 6 случайных символов
        ]);

        return back()->with('short_url', url($link->short_code));
    }

    public function redirect($code)
    {
        // 1. Ищем запись в таблице links, где в колонке short_code стоит наш $code
        // firstOrFail() — если не найдет, сам покажет ошибку 404
        $link = \App\Models\Link::where('short_code', $code)->firstOrFail();

        // 2. (Бонус) Увеличиваем счетчик кликов
        $link->increment('clicks');

        // 3. Отправляем пользователя на оригинальный сайт
        return redirect($link->original_url);
    }

    public function index()
    {
        // Берем последние 10 ссылок, отсортированных по дате (новые сверху)
        $links = \App\Models\Link::query()->latest()->take(8)->get();

        return view('welcome', compact('links'));
    }
}
