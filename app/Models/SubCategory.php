<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCategory extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'language_id',
        'category_id',
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
    ];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function tours()
    {
    	    return $this->hasMany(Tour::class);
    }
    public function tags()
    {
            return $this->belongsToMany(Tag::class,'sub_category_tags');
    }

}
