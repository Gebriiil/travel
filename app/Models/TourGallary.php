<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TourGallary extends Model
{

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'tour_id',
        'img',
        'img_title',
        'img_alt',

    ];
}
