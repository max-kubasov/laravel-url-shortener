<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LinkController extends Controller
{
    public function index()
    {
        // Получаем ссылки только текущего пользователя, если он вошел
        $links = auth()->check()
            ? Link::where('user_id', auth()->id())->latest()->get()
            : collect(); // если не вошел, отдаем пустой список

        return view('welcome', compact('links'));
    }

    public function store(Request $request)
    {
        $request->validate(['url' => 'required|url']);

        $link = Link::create([
            'original_url' => $request->url,
            'short_code'   => Str::random(6),
            'user_id'      => auth()->id(), // Привязываем ID юзера (может быть null, если гость)
        ]);

        return back()->with('short_url', url($link->short_code));
    }

    public function redirect(Link $link)
    {

        $link->increment('clicks');

        // 3. Отправляем пользователя на оригинальный сайт
        return redirect($link->original_url);
    }


}
