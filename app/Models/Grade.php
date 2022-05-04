<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    
    protected $guarded = [];

    protected $fillable = ['name','class_type_id','mark_from','mark_to','remark'];

    public function class_type()
    {
        return $this->belongsTo(ClassType::class);
    }

    public function mark()
    {
        return $this->hasMany(Mark::class);
    }
}
