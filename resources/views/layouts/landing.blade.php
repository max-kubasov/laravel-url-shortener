<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | PureLnk</title>
    <meta name="description" content="@yield('description')">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 text-slate-900 antialiased">
<nav class="p-6 flex justify-between items-center bg-white shadow-sm">
    <a href="/" class="text-2xl font-bold text-blue-600">PureLnk</a>
    <a href="/register" class="bg-blue-600 text-white px-4 py-2 rounded-lg">Get Started</a>
</nav>

<main>
    @yield('content')
</main>

<footer class="p-10 bg-slate-900 text-slate-400 text-center">
    <p>&copy; 2026 PureLnk. All rights reserved.</p>
</footer>
</body>
</html>
