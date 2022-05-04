<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    protected $fillable = ['name','slug','my_class_id','teacher_id'];

    public function student_record()
    {
        return $this->hasMany(StudentExamRecord::class);
    }

    public function my_class()
    {
        return $this->belongsTo(MyClass::class);
    }

    public function teacher()
    {
        return $this->belongsTo(User::class);
    }
}
