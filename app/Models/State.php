<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = ['lga_id','name'];

    public function lga()
    {
        return $this->belongsTo(Lga::class);
    }

    public function student()
    {
        return $this->hasMany(student::class);
    }
}
