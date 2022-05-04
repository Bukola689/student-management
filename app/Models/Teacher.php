<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = ['name'];

    public function bloodgroup()
    {
        return $this->belongsTo(Blood_group::class);
    }

    public function lga()
    {
        return $this->belongsTo(Lga::class);
    }

    public function nationality()
    {
        return $this->belongsTo(Nationality::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }
}
