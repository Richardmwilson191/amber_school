<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentHistory extends Model
{
    use HasFactory;

    protected $fillable = ['student_id', 'date_paid', 'desc'];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
