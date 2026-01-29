<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-slate-800 leading-tight">Admin Insights</h2>
    </x-slot>

    <div class="py-12 bg-slate-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
                    <p class="text-slate-500 text-sm font-medium uppercase">Total Users</p>
                    <h3 class="text-3xl font-bold text-slate-900">{{ $total_users }}</h3>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
                    <p class="text-slate-500 text-sm font-medium uppercase">Total Links</p>
                    <h3 class="text-3xl font-bold text-blue-600">{{ $total_links }}</h3>
                </div>
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
                    <p class="text-slate-500 text-sm font-medium uppercase">Total Clicks</p>
                    <h3 class="text-3xl font-bold text-green-600">{{ $total_clicks }}</h3>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
                <div class="px-6 py-4 border-b border-slate-100 bg-slate-50/50">
                    <h3 class="font-bold text-slate-800">Global Recent Links</h3>
                </div>
                <table class="w-full text-left">
                    <thead>
                    <tr class="text-slate-400 text-xs uppercase">
                        <th class="px-6 py-3">Link</th>
                        <th class="px-6 py-3">Owner</th>
                        <th class="px-6 py-3">Clicks</th>
                        <th class="px-6 py-3">Created</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-sm">
                    @foreach($recent_links as $link)
                        <tr>
                            <td class="px-6 py-4 font-mono text-blue-500">{{ $link->short_code }}</td>
                            <td class="px-6 py-4">{{ $link->user->name ?? 'Guest' }}</td>
                            <td class="px-6 py-4">{{ $link->clicks }}</td>
                            <td class="px-6 py-4 text-slate-400">{{ $link->created_at->diffForHumans() }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <div class="mt-8 bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
                    <div class="px-6 py-4 border-b border-slate-100 bg-slate-50/50">
                        <h3 class="font-bold text-slate-800">All Users</h3>
                    </div>
                    <table class="w-full text-left">
                        <thead>
                        <tr class="text-slate-400 text-xs uppercase">
                            <th class="px-6 py-3 font-medium text-left">Name</th>
                            <th class="px-6 py-3 font-medium text-left">Email</th>

                            <th class="px-6 py-3 font-medium text-left">
                                <a href="{{ route('admin.dashboard', ['sort' => 'links_count', 'direction' => $currentDirection == 'desc' ? 'asc' : 'desc']) }}" class="flex items-center hover:text-slate-600">
                                    Links
                                    @if($currentSort == 'links_count')
                                        <span class="ml-1">{{ $currentDirection == 'desc' ? '↓' : '↑' }}</span>
                                    @endif
                                </a>
                            </th>

                            <th class="px-6 py-3 font-medium text-left">
                                <a href="{{ route('admin.dashboard', ['sort' => 'clicks', 'direction' => $currentDirection == 'desc' ? 'asc' : 'desc']) }}" class="flex items-center hover:text-slate-600">
                                    Total Clicks
                                    @if($currentSort == 'clicks')
                                        <span class="ml-1">{{ $currentDirection == 'desc' ? '↓' : '↑' }}</span>
                                    @endif
                                </a>
                            </th>

                            <th class="px-6 py-3 text-right">Actions</th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 text-sm">
                        @foreach($users as $user)
                            <tr class="{{ $user->is_banned ? 'bg-red-50/50' : '' }}">
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                        <span class="font-medium {{ $user->is_banned ? 'text-red-700' : 'text-slate-900' }}">
                            {{ $user->name }}
                        </span>
                                        @if($user->is_banned)
                                            <span class="ml-2 px-2 py-0.5 text-[10px] font-bold bg-red-100 text-red-600 border border-red-200 rounded uppercase">
                                Banned
                            </span>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-slate-500">{{ $user->email }}</td>
                                <td class="px-6 py-4 font-semibold">{{ $user->links_count }}</td>
                                <td class="px-6 py-4 font-bold text-blue-600">
                                    {{ $user->total_clicks ?? 0 }}
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <form action="{{ route('admin.users.ban', $user) }}" method="POST">
                                        @csrf
                                        <button type="submit"
                                                class="inline-flex items-center px-3 py-1.5 rounded-lg text-xs font-bold transition-all shadow-sm
                                {{ $user->is_banned
                                    ? 'bg-emerald-50 text-emerald-600 border border-emerald-200 hover:bg-emerald-100'
                                    : 'bg-red-50 text-red-600 border border-red-200 hover:bg-red-100' }}">
                                            {{ $user->is_banned ? 'Unlock User' : 'Block User' }}
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
