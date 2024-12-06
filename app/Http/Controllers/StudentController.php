<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Http\Resources\StudentResource;

class StudentController extends Controller
{
    public function store(StudentRequest $request) {
        $validatedData = $request->validated();

        $student = Student::create($validatedData);
        return new StudentResource($student);
    }

    public function show(Student $student) {
        return new StudentResource($student);
    }

    public function index() {
        return StudentResource::collection(Student::all());
    }
}
