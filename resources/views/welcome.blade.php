<!DOCTYPE html>
<html>
<head>
    <title>Сокращатель ссылок</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-900 flex items-center justify-center h-screen">
<div class="bg-slate-800 p-8 rounded-lg shadow-xl w-96 border border-slate-700">
    <h1 class="text-2xl font-bold mb-4 text-center text-white">Сократить ссылку</h1>


    <form action="/shorten" method="POST">
        @csrf
        <input type="url" name="url" placeholder="Вставьте ссылку" required
               class="w-full bg-slate-700 border border-slate-600 p-2 rounded mb-4 text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500">

        <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded hover:bg-blue-600 transition">
            Сократить
        </button>

        @if(session('short_url'))
            <div class="mt-6 p-4 bg-slate-700 rounded-lg border border-blue-500/50">
                <p class="text-slate-300 text-sm mb-2 text-center">Твоя ссылка готова:</p>
                <div class="flex items-center bg-slate-900 p-2 rounded border border-slate-600">
                    <input type="text" readonly value="{{ session('short_url') }}"
                           class="bg-transparent text-blue-400 font-mono text-sm w-full outline-none">
                    <a href="{{ session('short_url') }}" target="_blank" class="ml-2 text-slate-400 hover:text-white">
                        🔗
                    </a>
                </div>
            </div>
        @endif

    </form>
</div>
</body>
</html>
