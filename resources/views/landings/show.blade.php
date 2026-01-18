<x-app-layout>
    {{-- 1. Передаем заголовок для тега <title> --}}
    <x-slot name="title">
        {{ $landing->meta_title }}
    </x-slot>

    {{-- 2. Передаем заголовок для серой полосы сверху (как в Dashboard) --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $landing->h1_title }}
        </h2>
    </x-slot>

    {{-- 3. Основной контент (пойдет в переменную $slot) --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <h1 class="text-3xl font-bold mb-4">{{ $landing->h1_title }}</h1>

                <div class="prose max-w-none">
                    {!! $landing->main_text !!}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
