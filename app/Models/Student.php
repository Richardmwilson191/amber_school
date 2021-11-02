<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'frst_nm',
        'last_nm',
        'dob',
        'class',
        'phone_nbr',
        'email_addr',
        'gender',
        'has_birth_cert'
    ];

    public function subjectChoices()
    {
        return $this->hasMany(subjectChoice::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function transaction()
    {
        return $this->hasOne(Transaction::class);
    }

    public function paymentHistory()
    {
        return $this->hasMany(PaymentHistory::class);
    }

    public function getGenderAttribute($value)
    {
        if ($value === 'm') {
            $this->attributes['gender'] = 'Male';
        }
        if ($value === 'f') {
            $this->attributes['gender'] = 'Female';
        }

        return $this->attributes['gender'];
    }
}
