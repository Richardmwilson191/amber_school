<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\SubjectChoice;
use Illuminate\Http\Request;

class SubjectChoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('subjectChoice.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($student_id)
    {
        $subjects = Subject::whereHas('subjectChoices', function ($query) use ($student_id) {
            $query->where('student_id', '=', $student_id);
        }, '=', 0)->get();

        // $subject_choices = Subject::whereRelation('subjectChoices', 'student_id', '=', $student_id)->get();

        return view('subjectChoice.create', compact('student_id', 'subjects'));
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
            'student_id' => 'required',
            'subject_id' => 'required',
            'status' => 'required',
            'year_of_exam' => 'required'
        ]);

        $subC = SubjectChoice::create($validated);

        if ($request->status) {
            TransactionController::updateTransactionAmountDue($request->student_id, $subC->subject->cost_amt);
        }

        return redirect()->route('subjectchoice.create', $request->student_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubjectChoice  $subjectChoice
     * @return \Illuminate\Http\Response
     */
    public function show(SubjectChoice $subjectChoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubjectChoice  $subjectChoice
     * @return \Illuminate\Http\Response
     */
    public function edit(SubjectChoice $subjectChoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubjectChoice  $subjectChoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $subjectChoice)
    {
        $subC = SubjectChoice::find($subjectChoice);
        $subC->update([
            'status' => $request->status
        ]);

        TransactionController::updateTransactionAmountDue($subC->student_id, $subC->subject->cost_amt, $request->status);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubjectChoice  $subjectChoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubjectChoice $subjectChoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subject  $subjectChoice
     * @return \Illuminate\Http\Response
     */
    public function select(Subject $subject)
    {
        // SubjectChoice::create([

        // ])
        dd($subject);
    }
}
