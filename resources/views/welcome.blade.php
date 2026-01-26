<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>PureLnk | Professional URL Shortener & Link Management</title>
    <meta name="description" content="Shorten, brand, and track your links with PureLnk. The most advanced link management platform for marketing and social media.">
    <meta name="keywords" content="url shortener, link tracker, branded links, instagram bio link, whatsapp link generator">

    <meta property="og:type" content="website">
    <meta property="og:url" content="https://purelnk.com/">
    <meta property="og:title" content="PureLnk | Professional URL Shortener">
    <meta property="og:description" content="Boost your click-through rate with clean, branded links and real-time analytics.">
    <meta property="og:image" content="https://purelnk.com/og-image.jpg"> <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:title" content="PureLnk | Professional URL Shortener">

    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @verbatim
    <script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "Organization",
          "name": "PureLnk",
          "url": "https://purelnk.com/",
          "logo": "https://purelnk.com/logo.png",
          "sameAs": [
            "https://twitter.com/purelnk",
            "https://linkedin.com/company/purelnk"
          ]
        }
    </script>
    @endverbatim
</head>
<body class="bg-slate-900 px-6 py-12 flex flex-col min-h-screen font-sans antialiased">

<nav class="flex justify-end mb-8">
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

<div class="flex-grow flex flex-col items-center">
    <h1 class="sr-only">PureLnk - The Most Advanced URL Shortener & Link Management Tool</h1>
    @if ($errors->has('original_url'))
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4 w-full max-w-md" role="alert">
            <p class="font-bold">Security Warning!</p>
            <p>{{ $errors->first('original_url') }}</p>
        </div>
    @endif

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
        <div class="mt-12 mb-12 overflow-hidden rounded-xl border border-slate-700 bg-slate-800 shadow-xl w-full max-w-4xl">
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
</div> <footer class="py-6 border-t border-slate-800 mt-auto">
    <div class="max-w-7xl mx-auto">
        <div class="flex flex-col md:flex-row justify-between items-center gap-4 text-xs tracking-wide text-slate-500 uppercase">
            <nav class="flex gap-6">
                <a href="/tools" class="hover:text-blue-600 transition font-semibold">Solutions</a>
                <a href="/instagram-bio-link" class="hover:text-slate-400 transition">Instagram</a>
                <a href="/tiktok-link-shortener" class="hover:text-slate-400 transition">TikTok</a>
                <a href="/blog" class="hover:text-slate-400 transition">Blog</a>
                <a href="/news" class="hover:text-slate-400 transition">News</a>
            </nav>
            <div class="flex items-center gap-4">
                <span>&copy; 2026 PureLnk</span>
                <span class="flex items-center">
                        <span class="w-1.5 h-1.5 bg-green-500 rounded-full mr-1.5"></span>
                        API Online
                    </span>
            </div>
        </div>
    </div>
</footer>

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
