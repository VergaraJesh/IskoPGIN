<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    //
    protected $table = 'schools';
    protected $fillable = [
        'name',
        'course', 
        'college', 
        'year', 
    ];
}
