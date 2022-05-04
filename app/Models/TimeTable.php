<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeTable extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = ['time_table_record_id', 'time_slot_id', 'exam_date', 'day', 'timestamp_from', 'timestamp_to', 'subject_id',];

    public function time_slot()
    {
        return $this->belongsTo(TimeSlot::class);
    }

    public function time_table_record()
    {
        return $this->belongsTo(TimeTableRecord::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
