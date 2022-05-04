<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = ['name','my_class_id','description','author','book_type','url','location','total_copies','issued_copies'];

    public function my_class()
    {
        return $this->belongsTo(MyClass::class);
    }

    public function book_request()
  {
      return $this->hasMany(BookRequest::class);
  }

 

}
