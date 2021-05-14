<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScheduledLecture extends Model
{
    public $timestamps = false;
    protected $table = 'scheduled_lectures';
    protected $fillable = [
        'lecturer_id', 'course_id', 'date_time', 'lecture_id'
    ];

    public function lecturer()
    {
        return $this->belongsTo(Lecturer::class);
    }

    public function lecture()
    {
        return $this->belongsTo(Lecture::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
