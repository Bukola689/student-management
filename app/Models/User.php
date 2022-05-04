<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        
        'name',
        'code',
        'username',
        'user_type',
        'dob',
        'gender',
        'photo',
        'phone',
        'phone2',
        'blood_group_id',
        'state_id',
        'lga_id',
        'nationality_id',
        'address',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function bloodgroup()
    {
        return $this->belongsTo(BloodGroup::class);
    }

    public function student_record()
    {
        return $this->belongsTo(StudentRecord::class);
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

  public function bookrequest()
  {
      return $this->hasMany(BookRequest::class);
  }

  public function pin()
  {
      return $this->hasMany(Pin::class);
  }

  public function staffrecord()
    {
        return $this->hasMany(StaffRecord::class);
    }

    public function studentrecord()
    {
        return $this->hasMany(StudentRecord::class);
    }

    public function subject()
    {
        return $this->hasMany(Subject::class);
    }
}
