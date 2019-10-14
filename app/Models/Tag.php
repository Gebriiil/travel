<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    protected $fillable = ['name','desc','image','seo'];
    // use SoftDeletes;
    // protected $dates = ['deleted_at'];

    public function subcategories()
    {
            return $this->belongsToMany(SubCategory::class,'sub_category_tags');
    }
    public function tags()
    {
            return $this->belongsToMany(Tour::class,'tour_tags');
    }
}
