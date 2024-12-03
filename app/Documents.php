<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documents extends Model
{
    //
    protected $table = 'documents';
    protected $fillable = [
        'docu_id','staff','department','status','created_at','updated_at','date_received','date_created','date_name','tracknum','outin','docu_dets'
    ];
    public function records(){
        return $this->hasMany('App\DocRecords');
    }

}
