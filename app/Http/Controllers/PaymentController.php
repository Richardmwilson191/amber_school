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
     * Display all payments.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Payment::paginate(20)->sortBy('student_id');
        return view('payment.index', compact('payments'));
    }

    /**
     * Display payment form.
     *
     * @param  \App\Models\SubjectChoice  $subjectChoice
     * @return \Illuminate\Http\Response
     */
    public function make(SubjectChoice $subjectChoice)
    {
        return view('payment.make', compact('subjectChoice'));
    }

    /**
     * Executes the payment, make calculations and updates records.
     *
     * @param  \App\Models\SubjectChoice  $subjectChoice
     * @param  Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function pay(Request $request, SubjectChoice $subjectChoice)
    {
        $request->validate([
            'amount' => 'required',
        ]);


        $payment = Payment::where('student_id', $subjectChoice->student_id)
            ->where('subject_id', $subjectChoice->subject_id)->first();


        if ($payment !== null) {
            $balance_amt = $payment->balance_amt - $request->amount;
        } else {
            $balance_amt = $subjectChoice->subject->cost_amt - $request->amount;
        }

        // dd($balance_amt);
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

        $amount_due = 0;
        foreach ($subjectChoice->student->subjectChoices->where('status', 1) as $choice) {
            $amount_due += $choice->subject->cost_amt;
        }

        $t_amt_paid = $subjectChoice->student->payments->sum('amount_paid');

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
