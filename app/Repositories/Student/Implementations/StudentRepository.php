<?php

namespace App\Repositories\Student\Implementations;

use App\Models\Student;
use App\Repositories\Country\CountryInterface;
use App\Repositories\Student\StudentInterface;

class StudentRepository implements StudentInterface
{
    private $countryRepository, $students;

    public function __construct(CountryInterface $country)
    {
        $this->students = new Student;
        $this->countryRepository = $country;
    }

    public function storeStudent($request): Student
    {
        $this->students->name = $request->name;
        $this->students->phone_number = $request->phone_number;
        $this->students->email = $request->email;
        $this->students->country = $this->countryRepository->getCountryNameFromCode($request->country_code);
        $this->students->country_code = $this->countryRepository->sanitizeCountryCode($request->country_code);
        $this->students->save();
        return $this->students;
    }

    public function applyFilter($search)
    {
        $this->students = $this->students->where(function ($query) use($search) {
            $query->where('name', 'LIKE', '%'.$search.'%')
                ->orWhere('phone_number', 'LIKE', '%'.$search.'%')
                ->orWhere('email', 'LIKE', '%'.$search.'%')
                ->orWhere('country', 'LIKE', '%'.$search.'%')
                ->orWhere('country_code', 'LIKE', '%'.$this->countryRepository->sanitizeCountryCode($search).'%');
        });
    }

    public function getList()
    {
        return $this->students->get();
    }
}
