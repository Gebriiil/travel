<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Testimonial extends Model
{
    protected $fillable = ['name','language_id','img','description','link','position'];
    use SoftDeletes;
    protected $dates = ['deleted_at'];
}
