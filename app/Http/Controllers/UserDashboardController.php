<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function index()
    {
        // Получаем только ссылки текущего залогиненного пользователя
        $links = auth()->user()->links()->latest()->get();

        return view('dashboard', [
            'links' => $links
        ]);
    }
}
