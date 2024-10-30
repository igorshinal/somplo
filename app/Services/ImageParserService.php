<?php

namespace App\Services;

class ImageParserService
{
    /**
     * @param string $url
     * @param int $limit
     * @return array
     */
    public function getImages(string $url, int $limit = 8): array
    {
        $html = $this->fetchHtml($url);

        if (!$html) {
            return [];
        }

        preg_match_all('/<img[^>]+src="([^">]+)"/', $html, $matches);

        return array_slice($matches[1], 0, $limit);
    }

    /**
     * @param string $url
     * @return string|null
     */
    private function fetchHtml(string $url): ?string
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);

        $result = curl_exec($ch);
        $error = curl_error($ch);

        curl_close($ch);

        if ($error) {
            // Логируем ошибку при необходимости
            return null;
        }

        return $result;
    }
}

