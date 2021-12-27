<?php

namespace App\Repositories\Country\Implementations;

use App\Repositories\Country\CountryInterface;
use Illuminate\Support\Facades\Http;

class CountryRepository implements CountryInterface
{
    public function getCountryNameFromCode($code): ?string
    {
        $response = Http::get('https://restcountries.com/v2/callingcode/'.$this->sanitizeCountryCode($code).'?fields=name');
        $result_json = $response->json();
        return $result_json[0]["name"] ?? null;
    }

    public function sanitizeCountryCode($code): string
    {
        return ltrim($code,'+');
    }
}
