<?php

namespace App\Http\Requests;

use App\Rules\ValidCountryCode;
use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:60',
            'phone_number' => 'required|integer|digits_between:6,15|unique:students,phone_number',
            'email' => 'required|max:80|unique:students,email',

            // ValidCountryCode is a custom rule which will check if country code exists
            'country_code' => ['required', 'regex:/^\+\d{1,3}$/', new ValidCountryCode],
        ];
    }
}
