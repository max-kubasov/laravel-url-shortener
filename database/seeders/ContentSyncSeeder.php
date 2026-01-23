<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ContentSyncSeeder extends Seeder
{
    public function run(): void
    {
        $this->syncFolder('news');
        $this->syncFolder('blog');
    }

    private function syncFolder($type)
    {
        $files = Storage::disk('local')->files("content/{$type}");

        // Собираем все слаги (имена файлов) из папки
        $existingSlugs = collect($files)->map(fn($f) => pathinfo($f, PATHINFO_FILENAME));

        // Удаляем из базы те записи этого типа, которых нет в списке файлов
        Post::where('type', $type)->whereNotIn('slug', $existingSlugs)->delete();

        // Получаем все файлы .html из папки
        $files = Storage::disk('local')->files("content/{$type}");
        dump($files);
        foreach ($files as $filePath) {
            $slug = pathinfo($filePath, PATHINFO_FILENAME);
            $rawContent = Storage::disk('local')->get($filePath);

            // Разделяем заголовок (1-я строка) и контент (остальное)
            $lines = explode("\n", $rawContent);
            $title = trim(array_shift($lines)); // Извлекаем первую строку
            $htmlContent = implode("\n", $lines); // Собираем остальное обратно

            Post::updateOrCreate(
                ['slug' => $slug], // Если такой slug есть — обновим
                [
                    'title' => $title,
                    'content' => $htmlContent,
                    'type' => $type,
                    'is_published' => true,
                    'excerpt' => Str::limit(strip_tags($htmlContent), 150),
                    'created_at' => filemtime(storage_path("app/private/content/{$type}/{$slug}.html")),
                ]
            );
        }
    }
}
