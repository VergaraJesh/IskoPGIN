<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brgy extends Model
{
    //
    protected $table = 'brgys';
    public function mun(){
        return $this->belongsTo('App\Municipality');
    }
}
