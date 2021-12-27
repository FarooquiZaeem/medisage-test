<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Repositories\Student\StudentInterface;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    private $studentRepository;

    // Injecting Student Repository (bind in RepositoryServiceProvider)
    public function __construct(StudentInterface $student)
    {
        $this->studentRepository = $student;
    }

    // StoreStudentRequest class will validate the request class
    public function store(StoreStudentRequest $request)
    {
        $this->studentRepository->storeStudent($request);
        return ["status" => 1, "message" => "Student record saved successfully!"];
    }

    public function index(Request $request)
    {
        $this->studentRepository->applyFilter($request->search);
        return $this->studentRepository->getList();
    }
}
