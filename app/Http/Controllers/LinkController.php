<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Services\GoogleSafeBrowsingService;

class LinkController extends Controller
{
    public function index()
    {
        // Получаем ссылки только текущего пользователя, если он вошел
        $links = auth()->check()
            ? Link::where('user_id', auth()->id())->latest()->get()
            : collect(); // если не вошел, отдаем пустой список

        // Проверяем, на какой странице мы находимся
        // Если запрос пришел на /dashboard, отдаем в dashboard.blade.php
        if (request()->routeIs('dashboard')) {
            return view('dashboard', compact('links'));
        }

        return view('welcome', compact('links'));
    }

    public function store(Request $request, GoogleSafeBrowsingService $service)
    {
        // 1. Валидация входных данных (всегда первая)
        $request->validate([
            'original_url' => 'required|url',
            'custom_code'  => [
                'nullable', 'alpha_dash', 'min:3', 'max:20', 'unique:links,short_code'
            ],
        ]);

        // --- ПРОВЕРКА 1: Общий лимит ссылок (всего) ---
        if (auth()->check()) {
            $user = auth()->user();
            $maxLinks = config("plans.{$user->plan}.max_links", 10);

            if ($user->links()->count() >= $maxLinks) {
                return back()->with('error', "Limit reached! You can only have {$maxLinks} links on " . strtoupper($user->plan) . " plan.");
            }
        }

        // --- ПРОВЕРКА 2: Лимит на кастомные алиасы (в месяц) ---
        if ($request->filled('custom_code')) {
            $maxCustom = config("plans.{$user->plan}.max_custom_slugs");

            $monthlyCustomCount = $user->links()
                ->where('is_custom', true) // используем наше новое поле
                ->whereMonth('created_at', now()->month)
                ->whereYear('created_at', now()->year)
                ->count();

            if ($monthlyCustomCount >= $maxCustom) {
                return back()->with('error', "Monthly limit for custom aliases reached ({$maxCustom}).");
            }
        }
        // ----------------------------------------------

        // 2. Получаем очищенный URL
        $url = $request->input('original_url');

        // 3. Дополнительная проверка безопасности через сервис (только если прошли лимиты)
        if (!$service->isSafe($url)) {
            return back()->withErrors(['original_url' => 'This URL is flagged as unsafe by Google Safe Browsing.']);
        }

        // 4. Логика выбора кода
        $shortCode = $request->custom_code ?? \Illuminate\Support\Str::random(6);

        $isCustom = $request->filled('custom_code');

        $link = Link::create([
            'original_url' => $request->original_url,
            'short_code'   => $shortCode,
            'user_id'      => auth()->id(),
            'is_custom'    => $isCustom,
        ]);

        if (auth()->check()) {
            return back()->with('success', 'Short link generated successfully!');
        }

        return back()->with('short_url', url($link->short_code));
    }

    public function redirect(Link $link)
    {

        $link->increment('clicks');

        // 3. Отправляем пользователя на оригинальный сайт
        return redirect($link->original_url);
    }

    public function destroy(\App\Models\Link $link)
    {
        // Проверка прав: если ID владельца ссылки не совпадает с ID текущего пользователя
        if ($link->user_id !== auth()->id()) {
            abort(403, 'У вас нет прав на удаление этой ссылки');
        }

        $link->delete();

        return back()->with('success', 'Ссылка успешно удалена!');
    }

    public function downloadQr(Link $link, $format)
    {
        $url = url($link->short_code);

        // Генерируем контент QR-кода
        $qrCode = QrCode::format($format)
            ->size(500)
            ->margin(1)
            ->generate($url);

        $fileName = "qr-purelnk-{$link->short_code}.{$format}";
        $contentType = ($format === 'png') ? 'image/png' : 'image/svg+xml';

        return response($qrCode)
            ->header('Content-Type', $contentType)
            ->header('Content-Disposition', "attachment; filename=\"{$fileName}\"");
    }

}
