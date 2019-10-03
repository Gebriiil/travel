<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transfer extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'from_place',
        'to_place',
        'arrival_date',
        'departure_date',
        'car_type',
        'adult_number',
        'children_number',
        'have_infants',
        'name',
        'email',
        'phone',
        'notes',
    ];
}
