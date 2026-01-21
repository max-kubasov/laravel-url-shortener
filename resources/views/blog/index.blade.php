@extends('layouts.guest-content')

@section('title', 'Our Blog')

@section('content')
    <div class="py-12">
        <div class="max-w-4xl mx-auto px-4">
            <h1 class="text-4xl font-extrabold mb-10">Latest Articles</h1>
            @foreach($posts as $post)
                <article class="mb-10 bg-white p-6 rounded-lg shadow-sm">
                    <h2 class="text-2xl font-bold mb-2">
                        <a href="{{ route('blog.show', $post) }}" class="text-blue-600 hover:underline">
                            {{ $post->title }}
                        </a>
                    </h2>
                    <p class="text-gray-600">{{ $post->excerpt }}</p>
                </article>
            @endforeach
        </div>
    </div>
@endsection
