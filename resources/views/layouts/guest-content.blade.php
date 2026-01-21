<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('meta_description', 'Professional URL Shortener')">

    <title>@yield('title', config('app.name', 'PureLnk'))</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-900 antialiased bg-gray-50">
<nav class="bg-white border-b border-gray-100 py-4">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center">
        <a href="/" class="font-bold text-2xl text-blue-600">
            {{ config('app.name') }}
        </a>

        <div class="space-x-8">
            <a href="{{ route('blog.index') }}" class="text-gray-600 hover:text-blue-600">Blog</a>
            <a href="{{ route('news.index') }}" class="text-gray-600 hover:text-blue-600">News</a>

            @auth
                <a href="{{ url('/dashboard') }}" class="text-gray-600 hover:text-blue-600">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="text-gray-600 hover:text-blue-600">Login</a>
            @endauth
        </div>
    </div>
</nav>

<main>
    @yield('content')
</main>

<footer class="bg-white border-t mt-20 py-10">
    <div class="max-w-7xl mx-auto px-4 text-center text-gray-500">
        &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
    </div>
</footer>
</body>
</html>
