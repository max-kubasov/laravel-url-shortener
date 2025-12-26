<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="py-12">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="p-6 text-gray-900">
                                    <h3 class="text-lg font-bold mb-4">My Links</h3>

                                    <table class="w-full text-left border-collapse">
                                        <thead>
                                        <tr class="border-b">
                                            <th class="py-2">Original URL</th>
                                            <th class="py-2">Short Link</th>
                                            <th class="py-2">Clicks</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($links as $link)
                                            <tr class="border-b">
                                                <td class="py-2">{{ Str::limit($link->original_url, 50) }}</td>
                                                <td class="py-2">
                                                    <a href="{{ route('links.show', $link->short_code) }}" class="text-blue-500">
                                                        {{ $link->short_code }}
                                                    </a>
                                                </td>
                                                <td class="py-2">{{ $link->clicks }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
