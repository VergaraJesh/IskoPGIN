<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    //
    protected $table = 'municipalities';
    public function brgys(){
        return $this->hasMany('App\Brgy');
    }
}
