<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PackagePricing extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];


    protected $fillable = [
        'tour_id',
        'title',
        'content',
      
    ];


    public function hotels()
    {
        return $this->hasMany('App\Models\PackagePricingHotel','package_pricings_id','id');
    }

}

