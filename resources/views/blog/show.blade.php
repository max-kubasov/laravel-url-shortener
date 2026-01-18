<x-app-layout>
    <x-slot name="title">{{ $post->meta_title ?? $post->title }}</x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $post->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <article class="bg-white p-8 shadow-sm sm:rounded-lg">
                <header class="mb-8">
                    <h1 class="text-4xl font-black">{{ $post->title }}</h1>
                    <p class="text-gray-500 mt-2 italic">Published on {{ $post->created_at->format('F j, Y') }}</p>
                </header>

                <div class="prose max-w-none">
                    {!! $post->content !!}
                </div>
            </article>
        </div>
    </div>
</x-app-layout>
