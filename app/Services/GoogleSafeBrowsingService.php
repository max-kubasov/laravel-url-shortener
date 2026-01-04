<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class GoogleSafeBrowsingService
{
    protected $apiKey;
    protected $apiUrl = 'https://safebrowsing.googleapis.com/v4/threatMatches:find';

    public function __construct()
    {
        // Берем ключ из нашего .env
        $this->apiKey = config('services.google.safe_browsing_key');
    }

    public function isSafe(string $url): bool {

        if (!$this->apiKey) {
            return true; // Если ключа нет, пропускаем (чтобы сайт не сломался)
        }

        $response = Http::post("{$this->apiUrl}?key={$this->apiKey}", [
            'client' => [
                'clientId' => 'purelnk',
                'clientVersion' => '1.0.0',
            ],
            'threatInfo' => [
                'threatTypes' => ['MALWARE', 'SOCIAL_ENGINEERING', 'UNWANTED_SOFTWARE'],
                'platformTypes' => ['ANY_PLATFORM'],
                'threatEntryTypes' => ['URL'],
                'threatEntries' => [
                    ['url' => $url],
                ],
            ],
        ]);

        // Если Google что-то нашел, придет массив с угрозами.
        // Если пусто — значит ссылка безопасна.
        return empty($response->json()['matches']);
    }
}
