<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Statistics for') }}: {{ $link->original_url }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-bold mb-4">{{ __('Clicks by Country') }}</h3>

                @if($countries->isEmpty())
                    <p class="text-gray-500">{{ __('No visit data available yet.') }}</p>
                @else
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">{{ __('Country') }}</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">{{ __('Code') }}</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">{{ __('Total Clicks') }}</th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                        @foreach($countries as $stat)
                            <tr>
                                <td class="px-6 py-4">{{ $stat->country_name ?? 'Unknown' }}</td>
                                <td class="px-6 py-4">{{ $stat->country_code ?? '--' }}</td>
                                <td class="px-6 py-4 font-bold">{{ $stat->total }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif

                <div class="mt-6">
                    <a href="{{ route('dashboard') }}" class="text-blue-500 hover:underline">&larr; {{ __('Back to Dashboard') }}</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
