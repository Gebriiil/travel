<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DailyPricing extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];


    protected $fillable = [
        'tour_id',
        'title',
        'content',
        'one_person',
        'two_persons',
        'three_persons',
        'four_persons',
        'five_persons',
        'six_persons',
    ];

    public function dailyPricingHotel()
    {
    	return $this->hasMany('App\Models\DailyPricingHotel','daily_pricings_id','id');
    }

}

