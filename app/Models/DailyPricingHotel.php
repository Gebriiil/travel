<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DailyPricingHotel extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];


    protected $fillable = [
        'daily_pricings_id',
        'hotel_id',

    ];

    public function hotel()
    {
    	return $this->has('App\Models\Hotel','id','hotel_id');
    }


}
