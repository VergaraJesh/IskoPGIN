<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    //
    protected $table = 'colleges';
    public function courses(){
        return $this->hasMany('App\Course');
    }
}
