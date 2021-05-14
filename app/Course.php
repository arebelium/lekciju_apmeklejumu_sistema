<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public $timestamps = false;
    protected $table = 'courses';
    protected $fillable = [
        'name'
    ];

    public function lectures()
    {
        return $this->hasMany(Lecture::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
