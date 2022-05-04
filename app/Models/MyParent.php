<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyParent extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = ['user_id','occupation'];

}
