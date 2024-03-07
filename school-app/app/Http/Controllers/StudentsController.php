<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        return
        view('student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return
        view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'=>'requiared',
            'class'=>'requared|class',
        ])
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $students = Student::findOrFails($id);
        $students->student_id= $request->student_id;
        $students->date= $request->date;
        $students->is_present = $request->is_present;
        $students->save();

        return redirect()->route('student.index')->with('success', 'Студенты обновлены успешно');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $students)
    {
        $students->delete();

        return redirect()->route('students.index')->with('success', 'Студент успешно удален');
    }
}
