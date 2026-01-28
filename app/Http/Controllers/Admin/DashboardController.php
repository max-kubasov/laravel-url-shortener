<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Link;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_users' => User::count(),
            'total_links' => Link::count(),
            'total_clicks' => Link::sum('clicks'),
            'recent_links' => Link::with('user')->latest()->take(10)->get(),
            'top_users' => User::withCount('links')->orderBy('links_count', 'desc')->take(5)->get(),
        ];

        return view('admin.dashboard', $stats);
    }
}
