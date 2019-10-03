<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SeoDetail extends Model
{
    public function customer()
    {
    	return $this->hasOne('App\Models\Customer','id','customer_id');
    }
}
