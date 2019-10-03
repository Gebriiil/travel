<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservation extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];


    protected $fillable = [
        'name',
        'tour_id',
        'email',
        'phone',
        'nationality',
        'arrival_date',
        'departure_date',
        'adult_number',
        'children_number',
        'children_age',
        'message',
    ];
}
