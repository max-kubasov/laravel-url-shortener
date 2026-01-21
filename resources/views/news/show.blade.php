@extends('layouts.guest-content')

{{-- 1. Передаем заголовок во вкладку браузера --}}
@section('title', $post->meta_title ?? $post->title)

{{-- 2. Передаем описание для SEO --}}
@section('meta_description', $post->meta_description ?? $post->excerpt)

@section('content')


    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <article class="bg-white p-8 shadow-sm sm:rounded-lg">
                <header class="mb-8">
                    <h1 class="text-4xl font-black text-gray-900">{{ $post->title }}</h1>
                    <p class="text-gray-500 mt-2 italic text-sm">
                        Published on {{ $post->created_at->format('F j, Y') }}
                    </p>
                </header>

                {{-- Основной текст новости --}}
                <div class="prose prose-blue max-w-none">
                    {!! $post->content !!}
                </div>
            </article>

            <div class="mt-8 text-center">
                <a href="{{ route('news.index') }}" class="text-blue-600 hover:underline">
                    &larr; Back to all news
                </a>
            </div>
        </div>
    </div>
@endsection
