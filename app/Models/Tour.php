<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tour extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
      'language_id',
      'sub_category_id',
      'city_id',
      'name',
      'small_desc',
      'show_in_special_offers',
      'num_of_days',
      'desc',
      'img',
      'img_alt',
      'img_title',
      'cover',
      'cover_alt',
      'cover_title',
      'price_start_from',
      'inclusion',
      'exclusion',
      'price_table_id',
      'seo',
      'slug',
      'num_of_stars',
      'breakfast',
      'wifi',
    ];


    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }
    public function city()
    {
        return $this->belongsTo(city::class);
    }



}
