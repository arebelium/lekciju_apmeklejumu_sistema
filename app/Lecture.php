<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    public $timestamps = false;
    protected $table = 'lectures';
    protected $fillable = [
        'name','date', 'time', 'lecturer'
    ];

}
