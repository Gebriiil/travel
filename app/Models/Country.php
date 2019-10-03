<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name'  ,
        'icon'  ,
        'language_id'  ,
    ];


    public function category()
    {
    	return $this->hasMany('App\Models\Category','country_id','id');
    }

    public function city()
    {
        return $this->hasMany('App\Models\City','country_id','id');
    }

}
