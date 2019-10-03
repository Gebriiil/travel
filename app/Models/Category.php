<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
     use SoftDeletes;
     protected $dates = ['deleted_at'];

    protected $fillable = [
        'language_id',
        'country_id',
        'name',
        'img',
        'img_alt',
        'img_title',
        'cover',
        'cover_alt',
        'cover_title',
        'small_desc',
        'desc',
        'seo',
        'slug',
        'featured',
        'show_in_footer',
        'childrens_policy',
    ];


    public function sub()
    {
    	return $this->hasMany('App\Models\SubCategory','category_id','id');
    }

    public function country()
    {
    	return $this->hasOne('App\Models\Country','id','country_id');
    }
}
