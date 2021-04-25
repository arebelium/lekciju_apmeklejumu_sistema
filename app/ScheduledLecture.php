<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScheduledLecture extends Model
{
    public $timestamps = false;
    protected $table = 'lecture_schedule';
    protected $fillable = [
        'lecture_id','lecturer_id', 'date', 'time'
    ];

}