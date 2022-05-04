<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lga extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = ['name'];

    public function state()
    {
        return $this->hasMany(State::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
