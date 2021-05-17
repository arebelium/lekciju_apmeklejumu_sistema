<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{

    protected $fillable = [
        'scheduled_lecture_id', 'student_id'
    ];

    public function student()
    {
        return Student::find($this->student_id);
    }

    public function sc_lecture()
    {
        return ScheduledLecture::find($this->scheduled_lecture_id);
    }
}
