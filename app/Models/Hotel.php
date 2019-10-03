<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hotel extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name'  ,
        'img'  ,
        'img_title'  ,
        'img_alt'  ,
        'city_id'  ,
        'language_id'  ,
    ];



    public function city()
    {
        return $this->hasOne('App\Models\City','id','city_id');
    }

}
