<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = ['name','my_class_id','teacher_id','active'];

    public function teacher()
    {
        return $this->belongsTo(User::class);
    }

    public function my_class()
    {
        return $this->belongsTo(MyClass::class);
    }

    public function mark()
    {
        return $this->belongsTo(Mark::class);
    }

    public function exam_record()
    {
        return $this->belongsTo(ExamRecord::class);
    }

    public function student_record()
    {
        return $this->hasMany(StudentExamRecord::class);
    }
}
