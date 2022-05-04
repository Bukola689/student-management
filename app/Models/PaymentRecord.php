<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentRecord extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = ['payment_id', 'student_record_id','ref_no','amt_paid', 'balance', 'paid', 'year'];

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

    public function student_record()
    {
        return $this->belongsTo(StudentRecord::class);
    }
}
