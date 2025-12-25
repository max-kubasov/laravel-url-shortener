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
                    <input type="text" id="shortUrl" readonly value="{{ session('short_url') }}"
                           class="bg-transparent text-blue-400 font-mono text-sm w-full outline-none">

                    <button type="button" onclick="copyTextToClipboard()" class="ml-3 text-slate-400 hover:text-blue-400 transition-colors">
                        <span id="copyIcon">📋</span>
                    </button>
                </div>
                <p id="copyMessage" class="text-green-400 text-xs mt-2 text-center hidden font-medium">Скопировано!</p>
            </div>
        @endif

    </form>
</div>

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
