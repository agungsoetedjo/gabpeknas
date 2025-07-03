<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;

class GeoHelper
{
    public static function detectRegion()
    {
        $ipData = Http::get('https://ipwho.is')->json();

        if (!($ipData['success'] ?? false)) {
            return [
                'region' => null,
                'city' => null,
                'raw' => $ipData,
            ];
        }

        return [
            'region' => strtolower($ipData['region'] ?? ''),
            'city' => strtolower($ipData['city'] ?? ''),
            'raw' => $ipData,
        ];
    }
}