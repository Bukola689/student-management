<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dorm extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = ['name','description',];

    public function student_record()
    {
        return $this->hasMany(StudentExamRecord::class);
    }
}
