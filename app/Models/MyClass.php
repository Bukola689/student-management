<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyClass extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = ['class_type_id','name'];

    public function class_type()
    {
        return $this->belongsTo(ClassType::class);
    }

    public function subject()
    { 
        return $this->hasMany(Subject::class);
    }

    public function book()
    { 
        return $this->hasMany(Book::class);
    }
   
    public function mark()
    {
        return $this->hasMany(Mark::class);
    }

    public function exam_record()
    {
        return $this->hasMany(ExamRecord::class);
    }

    public function student_record()
    {
        return $this->hasMany(StudentRecord::class);
    }

    public function section()
    {
        return $this->hasMany(Section::class);
    }
}
