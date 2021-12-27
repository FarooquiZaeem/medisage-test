<?php

namespace App\Repositories\Country;

interface CountryInterface
{
    public function getCountryNameFromCode($code);
    public function sanitizeCountryCode($code);
}
