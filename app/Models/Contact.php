<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];


    protected $fillable = [
        'name'  ,
        'email'  ,
        'phone'  ,
        'country'  ,
        'msg_title'  ,
        'msg_body'  ,
    ];

}
