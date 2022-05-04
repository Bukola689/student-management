<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    protected $fillable = ['attendance_date', 'student_id', 'remark', 'status',];

    public function student()
    {
        return $this->belongsTo(User::class);
    }

}
