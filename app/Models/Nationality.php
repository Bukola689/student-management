<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nationality extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = ['name'];

    public function student()
    {
        return $this->hasMany(Student::class);
    }
}
