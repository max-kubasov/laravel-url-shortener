<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Link;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // Получаем параметр сортировки из URL, по умолчанию - 'created_at'
        $sort = $request->get('sort', 'created_at');
        $direction = $request->get('direction', 'desc');

        $users = \App\Models\User::withCount('links')
            ->withSum('links as total_clicks', 'clicks') // Считаем сумму кликов во всех ссылках юзера
            ->when($sort == 'links_count', function ($query) use ($direction) {
                $query->orderBy('links_count', $direction);
            })
            ->when($sort == 'clicks', function ($query) use ($direction) {
                $query->orderBy('total_clicks', $direction);
            })
            ->when($sort == 'created_at', function ($query) use ($direction) {
                $query->orderBy('created_at', $direction);
            })
            ->get();

        return view('admin.dashboard', [
            'total_users' => \App\Models\User::count(),
            'total_links' => \App\Models\Link::count(),
            'total_clicks' => \App\Models\Link::sum('clicks'),
            'recent_links' => \App\Models\Link::with('user')->latest()->take(10)->get(),
            'users' => $users,
            'currentSort' => $sort,
            'currentDirection' => $direction,
        ]);
    }

    public function toggleBan(User $user)
    {
        // Запрещаем админу банить самого себя
        if ($user->id === auth()->id()) {
            return back()->with('error', 'You cannot ban yourself!');
        }

        $user->update([
            'is_banned' => !$user->is_banned
        ]);

        return back()->with('success', 'User status updated successfully.');
    }
}
