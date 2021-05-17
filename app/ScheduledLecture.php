<?php

namespace App;

use DateTime;
use Illuminate\Database\Eloquent\Model;

class ScheduledLecture extends Model
{
    public $timestamps = false;
    protected $table = 'scheduled_lectures';
    protected $fillable = [
        'lecturer_id', 'course_id', 'start_at', 'end_at', 'date', 'lecture_id'
    ];

    public function startDate()
    {
        return new DateTime("$this->date $this->start_at");
    }

    public function endDate()
    {
        return new DateTime("$this->date $this->end_at");
    }

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
