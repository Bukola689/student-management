<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassType extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = ['name','code'];

    public function myClass()
    {
        return $this->hasMany(MyClass::class);
    }

    public function grade()
    {
        return $this->hasMany(Grade::class);
    }
}
