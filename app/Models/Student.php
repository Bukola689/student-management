<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = ['parent_id','reg_number','dorm_id','class_id',];

    public function my_parent()
    {
        return $this->belongsTo(MyParent::class);
    }

    public function dorm()
    {
        return $this->belongsTo(Dorm::class);
    }

    public function my_class()
    {
        return $this->belongsTo(MyClass::class);
    }

}
