<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\PaymentHistory;
use App\Models\SubjectChoice;
use App\Models\Transaction;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubjectChoice  $subjectChoice
     * @return \Illuminate\Http\Response
     */
    public function make(SubjectChoice $subjectChoice)
    {
        return view('payment.make', compact('subjectChoice'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubjectChoice  $subjectChoice
     * @return \Illuminate\Http\Response
     */
    public function pay(Request $request, SubjectChoice $subjectChoice)
    {
        $request->validate([
            'amount' => 'required',
        ]);

        $subjects = SubjectChoice::with('subject')
            ->where('student_id', $subjectChoice->student_id)
            ->get();

        $amount_due = 0;
        foreach ($subjects as $choice) {
            $amount_due += $choice->subject->cost_amt;
        }

        $payment = Payment::where('student_id', $subjectChoice->student_id)
            ->where('subject_id', $subjectChoice->subject_id)->first();

        if ($payment !== null) {
            $balance_amt = $payment->balance_amt - $request->amount;
        } else {
            $balance_amt = $subjectChoice->subject->cost_amt;
        }

        Payment::updateOrCreate(
            [
                'student_id' => $subjectChoice->student_id,
                'subject_id' => $subjectChoice->subject_id
            ],
            [
                'amount_paid' => $payment?->amount_paid + $request->amount,
                'balance_amt' => $balance_amt,
                'date_paid' => date("Y-m-d")
            ]
        );

        PaymentHistory::create([
            'student_id' => $subjectChoice->student_id,
            'date_paid' => date("Y-m-d"),
            'desc' => $request->desc
        ]);

        $t_amt_paid = Payment::where('student_id', $subjectChoice->student_id)->sum('amount_paid');

        Transaction::updateOrCreate(
            [
                'student_id' => $subjectChoice->student_id
            ],
            [
                'amount_due' => $amount_due,
                'amount_paid' => $t_amt_paid,
                'balance_amt' => $amount_due - $t_amt_paid,
                'year_of_exam' => $subjectChoice->year_of_exam
            ]
        );

        return redirect()->route('student.show', $subjectChoice->student_id);
    }
}
