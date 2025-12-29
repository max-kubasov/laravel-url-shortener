<!DOCTYPE html>
<html>
<head>
    <title>Сокращатель ссылок</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-900 px-6 py-12 flex flex-col items-center justify-center h-screen">

<nav class="flex justify-end p-6 bg-slate-900">
    @if (Route::has('login'))
        <div class="space-x-4">
            @auth
                <a href="{{ url('/dashboard') }}" class="text-sm text-slate-400 underline hover:text-white transition">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="text-sm text-slate-400 underline hover:text-white transition">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="text-sm text-slate-400 underline hover:text-white transition">Register</a>
                @endif
            @endauth
        </div>
    @endif
</nav>

<div class="bg-slate-800 p-8 rounded-lg shadow-xl w-96 border border-slate-700">
    <h1 class="text-2xl font-bold mb-4 text-center text-white">Shorten your link</h1>


    <form action="{{ route('links.store') }}" method="POST">
        @csrf
        <input type="url" name="original_url" placeholder="Paste your link here..." required
               class="w-full bg-slate-700 border border-slate-600 p-2 rounded mb-4 text-white placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-blue-500">

        <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded hover:bg-blue-600 transition">
            Shorten
        </button>

        @if(session('short_url'))
            <div class="mt-6 p-4 bg-slate-700 rounded-lg">
                <p class="text-slate-300 text-sm mb-2 text-center">Your link is ready:</p>
                <div class="flex items-center bg-slate-900 p-2 rounded">
                    <input type="text" id="shortUrl" readonly value="{{ session('short_url') }}"
                           class="bg-transparent text-blue-400 font-mono text-sm w-full outline-none border-none focus:ring-0">

                    <button type="button" onclick="copyTextToClipboard()" class="ml-3 text-slate-400 hover:text-blue-400 transition-colors">
                        <span id="copyIcon">📋</span>
                    </button>
                </div>
                <p id="copyMessage" class="text-green-400 text-xs mt-2 text-center hidden font-medium">Copied!</p>
            </div>
        @endif


    </form>
</div>


@auth
<div class="mt-12 overflow-hidden rounded-xl border border-slate-700 bg-slate-800 shadow-xl">
    <div class="px-6 py-2 border-b border-slate-700">
        <h2 class="text-xl font-semibold text-white">Последние ссылки</h2>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
            <tr class="bg-slate-900/50">
                <th class="px-6 py-2 text-slate-400 font-medium text-sm">Короткая ссылка</th>
                <th class="px-6 py-2 text-slate-400 font-medium text-sm">Оригинал</th>
                <th class="px-6 py-2 text-center text-slate-400 font-medium text-sm">Клики</th>
            </tr>
            </thead>
            <tbody class="divide-y divide-slate-700">
            @foreach($links as $link)
                <tr class="hover:bg-slate-700/30 transition-colors">
                    <td class="px-6 py-2">
                        <a href="{{ url($link->short_code) }}" target="_blank" class="text-blue-400 hover:text-blue-300 font-mono">
                            {{ $link->short_code }}
                        </a>
                    </td>
                    <td class="px-6 py-2">
                        <p class="text-slate-400 text-sm truncate max-w-xs" title="{{ $link->original_url }}">
                            {{ $link->original_url }}
                        </p>
                    </td>
                    <td class="px-6 py-2 text-center">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-900 text-blue-200">
                            {{ $link->clicks }}
                        </span>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endauth

<script>
    function copyTextToClipboard() {
        const copyText = document.getElementById("shortUrl");
        const icon = document.getElementById("copyIcon");
        const message = document.getElementById("copyMessage");

        // Метод 1: Современный API
        if (navigator.clipboard && window.isSecureContext) {
            navigator.clipboard.writeText(copyText.value).then(() => {
                showSuccess(icon, message);
            }).catch(err => {
                fallbackCopy(copyText, icon, message);
            });
        } else {
            // Метод 2: Запасной вариант для старых браузеров
            fallbackCopy(copyText, icon, message);
        }
    }

    function fallbackCopy(copyText, icon, message) {
        copyText.select();
        try {
            document.execCommand('copy');
            showSuccess(icon, message);
        } catch (err) {
            console.error('Fallback copy failed', err);
        }
    }

    function showSuccess(icon, message) {
        icon.innerText = '✅';
        message.classList.remove('hidden');
        setTimeout(() => {
            icon.innerText = '📋';
            message.classList.add('hidden');
        }, 2000);
    }
</script>

</body>
</html>
