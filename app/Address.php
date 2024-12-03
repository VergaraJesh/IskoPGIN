<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    //
    protected $table = 'address';
 	public function brgy(){
        return $this->hasOne('App\Brgy');
    }
    public function mun(){
        return $this->hasOne('App\Municipality');
    }
}
