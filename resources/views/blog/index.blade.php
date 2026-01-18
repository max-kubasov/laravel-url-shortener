<x-app-layout>
    {{-- Передаем заголовок вкладки браузера --}}
    <x-slot name="title">Our Blog - Latest Articles</x-slot>

    {{-- Заголовок страницы (серая полоса) --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Blog') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                <h1 class="text-3xl font-bold mb-8 text-gray-900">Latest Articles</h1>

                <div class="space-y-8">
                    @forelse($posts as $post)
                        <article class="border-b pb-6">
                            <h2 class="text-2xl font-bold">
                                <a href="{{ route('blog.index', $post) }}" class="text-blue-600 hover:underline">
                                    {{ $post->title }}
                                </a>
                            </h2>
                            <p class="mt-2 text-gray-600">{{ $post->excerpt }}</p>
                            <div class="mt-4 text-sm text-gray-500">
                                {{ $post->created_at->format('M d, Y') }}
                            </div>
                        </article>
                    @empty
                        <p>No articles found.</p>
                    @endforelse
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
