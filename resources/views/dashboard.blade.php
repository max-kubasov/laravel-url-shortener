<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Links Library') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
                    <p class="text-sm font-medium text-gray-500 uppercase">Total Links</p>
                    <p class="text-3xl font-bold text-indigo-600">{{ $links->count() }}</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
                    <p class="text-sm font-medium text-gray-500 uppercase">Total Clicks</p>
                    <p class="text-3xl font-bold text-green-600">{{ $links->sum('clicks') }}</p>
                </div>
            </div>

            @auth
                <div class="mb-6 p-5 bg-white border border-slate-200 shadow-sm rounded-2xl">
                    <div class="flex items-center justify-between mb-3">
                        <div>
                            <h4 class="text-sm font-bold text-slate-800 uppercase tracking-tight">Usage Statistics</h4>
                            <p class="text-xs text-slate-500">Current Plan: <span class="text-blue-600 font-semibold uppercase">{{ auth()->user()->plan }}</span></p>
                        </div>
                        <div class="text-right">
                <span class="text-lg font-bold text-slate-900 leading-none">
                    {{ auth()->user()->links()->count() }} / {{ config("plans." . auth()->user()->plan . ".max_links") }}
                </span>
                            <p class="text-[10px] text-slate-400 uppercase font-medium">Links Used</p>
                        </div>
                    </div>

                    @php
                        $used = auth()->user()->links()->count();
                        $max = config("plans." . auth()->user()->plan . ".max_links");
                        // Защита от деления на ноль, если в конфиге пусто
                        $percentage = $max > 0 ? min(($used / $max) * 100, 100) : 0;

                        // Цвет полоски меняется на красный, если лимит близок к концу
                        $barColor = $percentage > 90 ? 'bg-red-500' : ($percentage > 70 ? 'bg-amber-500' : 'bg-blue-600');
                    @endphp

                    <div class="w-full bg-slate-100 rounded-full h-2.5 overflow-hidden">
                        <div class="{{ $barColor }} h-full rounded-full transition-all duration-700 ease-out shadow-sm"
                             style="width: {{ $percentage }}%">
                        </div>
                    </div>

                    @if($percentage >= 100)
                        <div class="mt-3 p-2 bg-red-50 border border-red-100 rounded-lg">
                            <p class="text-[11px] text-red-600 text-center font-medium">
                                ⚠️ You've reached your limit. Delete old links or upgrade your plan.
                            </p>
                        </div>
                    @endif
                </div>
            @endauth

            <div class="bg-white overflow-hidden shadow-sm rounded-xl border border-gray-200">
                <div class="p-8">
                    <h3 class="text-lg font-bold text-gray-800 mb-4">Create a new short link</h3>
                    @if (session('error'))
                        <div class="mb-4 p-4 bg-red-50 border-l-4 border-red-500 text-red-700">
                            <p class="text-sm font-medium">{{ session('error') }}</p>
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="mb-4 p-4 bg-green-50 border-l-4 border-green-500 text-green-700">
                            <p class="text-sm font-medium">{{ session('success') }}</p>
                        </div>
                    @endif
                    <form action="{{ route('links.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-12 gap-4 items-end">
                        @csrf
                        <div class="md:col-span-6">
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Destination URL</label>
                            <input type="url" name="original_url" placeholder="https://very-long-url.com/example" required
                                   class="w-full border-gray-200 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg bg-gray-50 transition">
                        </div>
                        <div class="md:col-span-4">
                            <label class="block text-xs font-bold text-gray-500 uppercase mb-1">Custom Alias (Optional)</label>
                            <div class="flex">
                                <span class="inline-flex items-center px-3 rounded-l-lg border border-r-0 border-gray-200 bg-gray-100 text-gray-500 text-sm italic">
                                    pure.lnk/
                                </span>
                                <input type="text" name="custom_code" placeholder="slug"
                                       class="flex-1 min-w-0 block w-full border-gray-200 focus:border-indigo-500 focus:ring-indigo-500 rounded-none rounded-r-lg bg-gray-50 transition">
                            </div>
                        </div>
                        <div class="md:col-span-2 text-right">
                            <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-6 rounded-lg shadow-md shadow-indigo-200 transition-all active:scale-95 h-[42px]">
                                Shorten
                            </button>
                        </div>
                    </form>
                    @if ($errors->any())
                        <div class="mt-4 p-3 bg-red-50 rounded-lg text-red-600 text-sm">
                            <ul class="list-disc ml-5">
                                @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>

            <div class="bg-white shadow-sm rounded-xl border border-gray-200 overflow-hidden">
                <div class="px-8 py-5 border-b border-gray-100 flex justify-between items-center bg-gray-50/50">
                    <h3 class="text-lg font-bold text-gray-800">My Links</h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead class="bg-gray-50 text-gray-500 text-xs uppercase font-bold">
                        <tr>
                            <th class="px-8 py-4">Original URL</th>
                            <th class="px-8 py-4">Short Link</th>
                            <th class="px-8 py-4 text-center">QR Code</th>
                            <th class="px-8 py-4 text-center">Stats</th>
                            <th class="px-8 py-4"></th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                        @foreach($links as $link)
                            <tr class="hover:bg-gray-50/80 transition-colors">
                                <td class="px-8 py-4">
                                    <div class="text-sm text-gray-400 italic mb-1">Target:</div>
                                    <div class="text-sm font-medium text-gray-900 truncate max-w-xs" title="{{ $link->original_url }}">
                                        <div x-data="{ open: false }">
                                            <div class="flex items-center space-x-2">
                                                <span class="truncate max-w-xs text-slate-600">{{ $link->original_url }}</span>
                                                @if(config("plans." . auth()->user()->plan . ".can_edit_links"))
                                                <button @click="open = true" class="text-slate-400 hover:text-blue-600 transition-colors">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                    </svg>
                                                </button>
                                                @else
                                                    <span title="Upgrade to PRO to edit" class="text-slate-300 cursor-not-allowed"></span>
                                                @endif
                                            </div>

                                            <div x-show="open"
                                                 class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50"
                                                 x-cloak>
                                                <div @click.away="open = false" class="bg-white rounded-xl shadow-lg p-6 w-full max-w-md">
                                                    <h3 class="text-lg font-bold mb-4">Edit Destination URL</h3>

                                                    <form action="{{ route('links.update', $link) }}" method="POST">
                                                        @csrf
                                                        @method('PATCH')

                                                        <div class="mb-4">
                                                            <label class="block text-sm font-medium text-slate-700 mb-1">New Long URL</label>
                                                            <input type="url" name="original_url" value="{{ $link->original_url }}" required
                                                                   class="w-full border-slate-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                                        </div>

                                                        <div class="flex justify-end space-x-3">
                                                            <button type="button" @click="open = false"
                                                                    class="px-4 py-2 text-sm font-medium text-slate-600 hover:bg-slate-100 rounded-lg">
                                                                Cancel
                                                            </button>
                                                            <button type="submit"
                                                                    class="px-4 py-2 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-lg">
                                                                Save Changes
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </td>
                                <td class="px-8 py-4">
                                    <div class="flex items-center space-x-3">
                                        <a href="{{ url($link->short_code) }}" target="_blank" class="text-indigo-600 font-bold hover:text-indigo-800 transition">
                                            {{ str_replace(['http://', 'https://'], '', url($link->short_code)) }}
                                        </a>
                                        <button onclick="copyToClipboard('{{ url($link->short_code) }}', this)"
                                                class="text-gray-400 hover:text-indigo-600 p-1 rounded-md hover:bg-indigo-50 transition-all">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                                <td class="px-8 py-4 text-center">
                                    <div class="inline-block p-1 bg-white border rounded-lg shadow-sm hover:scale-125 transition-transform">
                                        {!! QrCode::size(40)->generate(url($link->short_code)) !!}
                                    </div>
                                    <div class="mt-2">
                                        <a href="{{ route('links.qr', [$link->short_code, 'svg']) }}" class="text-[10px] font-bold text-gray-400 hover:text-green-600 uppercase tracking-wider">Download SVG</a>
                                    </div>
                                </td>
                                <td class="px-8 py-4 text-center">
                                    <div class="flex items-center justify-center space-x-2">
                                        <span class="font-bold">{{ $link->clicks }}</span>

                                        @if(config("plans." . auth()->user()->plan . ".can_view_analytics"))
                                            <a href="{{ route('links.stats', $link) }}" class="text-blue-500 hover:text-blue-700">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                                            </a>
                                        @else
                                            <button class="text-slate-300 cursor-not-allowed" title="Upgrade to PRO for analytics">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                                            </button>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-8 py-4 text-right text-sm">
                                    <form action="{{ route('links.destroy', $link) }}" method="POST" onsubmit="return confirm('Delete this link?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="text-gray-300 hover:text-red-600 transition-colors">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
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

    <script>
        function copyToClipboard(text, button) {
            navigator.clipboard.writeText(text).then(() => {
                const originalContent = button.innerHTML;
                button.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>';
                setTimeout(() => { button.innerHTML = originalContent; }, 2000);
            });
        }
    </script>
</x-app-layout>
