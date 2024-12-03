<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocRecords extends Model
{
    //
    protected $table = 'docu_pics';
    protected $fillable = [
        'docu_id',
        'pics',
    ];
    public function documents(){
        return $this->belongsTo('App\Documents');
    }
}
