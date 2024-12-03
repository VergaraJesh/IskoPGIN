<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schoolyear extends Model
{
    //
        protected $table = 'sys';
    protected $fillable = [
        'from',
        'to', 
    ];
    public function records(){
        return $this->hasMany('App\Record');
    }
}
