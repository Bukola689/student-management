<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = ['name','term','year'];

    public function exam_record()
    {
        return $this->hasMany(ExamRecord::class);
    }
}
