<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">Create a new short link</h3>

                    <form action="{{ route('links.store') }}" method="POST" class="flex flex-col md:flex-row gap-4">
                        @csrf
                        <div class="flex-grow">
                            <input
                                type="url"
                                name="original_url"
                                placeholder="Paste your long URL here (https://...)"
                                required
                                class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                            >
                        </div>
                        <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-6 rounded-md transition duration-150 ease-in-out">
                            Shorten
                        </button>
                    </form>

                    {{-- Отображение ошибок валидации --}}
                    @if ($errors->any())
                        <div class="mt-4 text-red-600 text-sm">
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="py-12">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="p-6 text-gray-900">
                                    <h3 class="text-lg font-bold mb-4">My Links</h3>

                                    <table class="w-full text-left border-collapse">
                                        <thead>
                                        <tr class="border-b">
                                            <th class="py-2">Original URL</th>
                                            <th class="py-2">Short Link</th>
                                            <th class="py-2">Clicks</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($links as $link)
                                            <tr class="border-b">
                                                <td class="py-2">{{ Str::limit($link->original_url, 50) }}</td>
                                                <td class="py-2">
                                                    <div class="flex items-center space-x-2">
                                                        <a
                                                            href="{{ url($link->short_code) }}"
                                                            id="url-{{ $link->id }}"
                                                            target="_blank"
                                                            rel="noopener noreferrer"
                                                            class="text-blue-600 font-medium hover:underline hover:text-blue-800 transition"
                                                        >
                                                            {{ url($link->short_code) }}
                                                        </a>

                                                        <button
                                                            onclick="copyToClipboard('{{ url($link->short_code) }}', this)"
                                                            class="bg-gray-100 hover:bg-gray-200 text-gray-600 px-2 py-1 rounded text-xs transition flex items-center"
                                                        >
                                                            <span>Copy</span>
                                                        </button>
                                                    </div>
                                                </td>
                                                <td class="py-2">{{ $link->clicks }}</td>
                                                <td class="py-2">
                                                    <form action="{{ route('links.destroy', $link) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-red-500 hover:text-red-700 transition">
                                                            DELETE
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


<script>
    function copyToClipboard(text, button) {
        navigator.clipboard.writeText(text).then(() => {
            // Меняем текст кнопки на время
            const originalText = button.innerHTML;
            button.innerHTML = '<span class="text-green-600">Copied!</span>';
            button.classList.add('bg-green-50');

            // Возвращаем как было через 2 секунды
            setTimeout(() => {
                button.innerHTML = originalText;
                button.classList.remove('bg-green-50');
            }, 2000);
        }).catch(err => {
            console.error('Ошибка при копировании: ', err);
        });
    }
</script>
