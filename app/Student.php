<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    protected $fillable = [
        'pic', 
        'fname',
        'mname',
        'lname',
        'suffix',
        'dob',
        'age',
        'contact',
        'email',
        'income',
        'scholartype',
        'cur_mun',
        'perma_brgy',
        'cur_brgy',
        'civilstatus',
        'status'
        
    ];
    public function records(){
        return $this->hasMany('App\Record')->orderBy('schoolyear_id', 'ASC')->orderBy('sem', 'ASC');
    }
    public function addresses(){
        return $this->hasOne('App\Brgy');
    }
    public function skills(){
        return $this->hasMany('App\Skills');
    }
    public function parents(){
        return $this->hasMany('App\Parents');
    }
    public function schools(){
        return $this->hasMany('App\School');
    }
    public function ltrs(){
        return $this->hasMany('App\Ltr');
    }
    public function tsws(){
        return $this->hasMany('App\Tsw');
    }
    public function activities(){
        return $this->hasMany('App\Activity');
    }
    public function awards(){
        return $this->hasMany('App\Award');
    }
    public function documents(){
        return $this->hasOne('App\Document');
    }
    public function interviews(){
        return $this->hasOne('App\Interview');
    }
    public function schoolarships(){
        return $this->hasOne('App\Scholarship');
    }
}
