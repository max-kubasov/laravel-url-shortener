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

            <div class="bg-white overflow-hidden shadow-sm rounded-xl border border-gray-200">
                <div class="p-8">
                    <h3 class="text-lg font-bold text-gray-800 mb-4">Create a new short link</h3>
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
                                        {{ $link->original_url }}
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
                                    <div class="inline-block p-1 bg-white border rounded-lg shadow-sm hover:scale-110 transition-transform">
                                        {!! QrCode::size(40)->generate(url($link->short_code)) !!}
                                    </div>
                                    <div class="mt-2">
                                        <a href="{{ route('links.qr', [$link->short_code, 'svg']) }}" class="text-[10px] font-bold text-gray-400 hover:text-green-600 uppercase tracking-wider">Download SVG</a>
                                    </div>
                                </td>
                                <td class="px-8 py-4 text-center">
                                    <div class="inline-flex items-center px-3 py-1 rounded-full bg-green-50 text-green-700 text-xs font-bold">
                                        {{ $link->clicks }} clicks
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
