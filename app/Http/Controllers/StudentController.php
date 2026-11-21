<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    
    public function index()
    {
        $students = Student::latest()->get();

        return view('students.index', compact('students'));
    }

    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
        ]);

        Student::create($validated);

        return redirect()->route('students.index')
            ->with('success', 'Student added successfully!');
    }

    
    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('students', 'email')->ignore($student->id),
            ],
        ]);

        $student->update($validated);

        return redirect()->route('students.index')
            ->with('success', 'Student updated successfully!');
    }

    
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')
            ->with('success', 'Student deleted successfully!');
    }
}
