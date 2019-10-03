<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slider extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'img',
        'title',
        'desc',
        'link',
        'img_title',
        'img_alt',
        'language_id',
        'sort',

    ];
}
