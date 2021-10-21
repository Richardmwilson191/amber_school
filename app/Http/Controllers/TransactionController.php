<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Update the transaction amount due.
     *
     * @return void
     */
    public static function updateTransactionAmountDue($student_id, $cost, bool $add = true)
    {
        // dd($student_id);
        $trans = Transaction::where('student_id', $student_id)->first();

        if ($trans === null) {
            $amount_due = $cost;
        } elseif ($add) {
            $amount_due = $trans->amount_due + $cost;
        } else {
            $amount_due = $trans->amount_due - $cost;
        }
        Transaction::updateOrCreate(
            [
                'student_id' => $student_id
            ],
            [
                'amount_due' => $amount_due,
                // 'amount_paid' => $t_amt_paid,
                // 'balance_amt' => $amount_due - $t_amt_paid,
                // 'year_of_exam' => $subjectChoice->year_of_exam
            ]
        );
    }
}
