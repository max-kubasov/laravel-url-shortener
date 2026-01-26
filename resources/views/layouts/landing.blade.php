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


<footer class="bg-slate-900 text-slate-400 py-12 border-t border-slate-800">
    <div class="max-w-6xl mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12 text-left mb-10">
            <div>
                <a href="/" class="text-white text-2xl font-bold mb-4 block">PureLnk</a>
                <p class="text-sm leading-relaxed">
                    The most advanced URL shortener for modern marketing. Boost your CTR and track every click with our branded link solutions.
                </p>
            </div>

            <div>
                <h4 class="text-white font-bold mb-4 uppercase text-xs tracking-widest">Solutions</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="/instagram-bio-link" class="hover:text-blue-400 transition">Instagram Bio Link</a></li>
                    <li><a href="/tiktok-link-shortener" class="hover:text-blue-400 transition">TikTok Bio Link</a></li>
                    <li><a href="/whatsapp-link-generator" class="hover:text-blue-400 transition">WhatsApp Links</a></li>
                    <li><a href="/tools" class="text-blue-400 font-semibold hover:underline">View All Tools &rarr;</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-white font-bold mb-4 uppercase text-xs tracking-widest">Resources</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="/blog" class="hover:text-blue-400 transition">Marketing Blog</a></li>
                    <li><a href="/news" class="hover:text-blue-400 transition">Platform News</a></li>
                    <li><a href="/register" class="hover:text-blue-400 transition">Create Free Account</a></li>
                </ul>
            </div>
        </div>

        <div class="pt-8 border-t border-slate-800 text-center text-xs">
            <p>&copy; 2026 PureLnk. All rights reserved.</p>
        </div>
    </div>
</footer>

</body>
</html>
