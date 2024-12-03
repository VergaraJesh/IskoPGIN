<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    //
    protected $fillable = [
        'student_id',
        'schoolyear_id',
        'yearlvl',
        'sem',
        'GWA',
    ];
    public function student(){
        return $this->belongsTo('App\Student');
    }
    public function schoolyear(){
        return $this->belongsTo('App\Schoolyear');
    }
}
