<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = ['payment_record_id','amt_paid','balance','year'];

    public function payment_record()
    {
        return $this->belongsTo(PaymentRecord::class);
    }


}
