<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactSchool extends Model
{
    //
    protected $table = 'schools_in';
    protected $fillable = [
        'sc_id','sc_name','district','sc_type','sc_head','sc_contact','sc_email',
    ];
}
