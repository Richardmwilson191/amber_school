<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Transaction;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return view('student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'frst_nm' => 'required',
            'last_nm' => 'required',
            'dob' => 'required',
            'class' => 'required',
            'phone_nbr' => 'required',
            'email_addr' => 'required|unique:students,email_addr',
            'gender' => 'required',
        ]);


        Student::create(
            $validated
        );

        return redirect()->route('student.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        $student_id = $student->id;
        $transactions = Transaction::where('student_id', $student_id)->get();
        return view('student.show', compact('student_id', 'transactions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('student.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'frst_nm' => 'required',
            'last_nm' => 'required',
            'dob' => 'required',
            'class' => 'required',
            'phone_nbr' => 'required',
            'email_addr' => 'required|unique:students,email_addr,' . $student . ',id',
            'gender' => 'required',
        ]);


        $student->update(
            $validated
        );

        return redirect()->route('student.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('student.index');
    }

    /**
     * Search for a specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $students = Student::where('frst_nm', $request->search)
            ->orWhere('last_nm', $request->search)
            ->paginate(5);
        return view('student.index', compact('students'));
    }
}
