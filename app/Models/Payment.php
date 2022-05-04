<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = ['title', 'email', 'amount', 'ref_no', 'method', 'my_class_id', 'description', 'year'];

    public function my_class()
    {
        return $this->belongsTo(MyClass::class);
    }
}
