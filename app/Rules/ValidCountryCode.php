<?php

namespace App\Rules;

use App\Repositories\Country\CountryInterface;
use App\Repositories\Country\Implementations\CountryRepository;
use Illuminate\Contracts\Validation\Rule;

class ValidCountryCode implements Rule
{

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        $countryRepository = new CountryRepository;
        return !!$countryRepository->getCountryNameFromCode($value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message(): string
    {
        return 'Country code is invalid.';
    }
}
