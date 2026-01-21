@extends('layouts.guest-content')

{{-- 1. Передаем заголовок для вкладки браузера --}}
@section('title', $landing->meta_title)

{{-- 2. Передаем описание для SEO (если добавил этот yield в guest-content) --}}
@section('meta_description', $landing->meta_description)

@section('content')

    {{-- Основной контент --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <h1 class="text-3xl font-bold mb-4 text-gray-900">
                    {{ $landing->h1_title }}
                </h1>

                <div class="prose max-w-none prose-blue">
                    {!! $landing->main_text !!}
                </div>

            </div>
        </div>
    </div>
@endsection
