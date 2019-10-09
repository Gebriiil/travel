<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
      'language_id'  ,
      'country_id'  ,
      'name'  ,
    ];


    public function country()
    {
        return $this->hasOne('App\Models\Country','id','country_id');
    }
    public function tours()
    {
        return $this->hasMany(Tour::class);
    }
}
