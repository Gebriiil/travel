<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class P2p extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];


    protected $fillable = [
        'name',
        'agent_name',
        'responsible_name',
        'country',
        'email',
        'phone',
        'msg_title',
        'msg_body',
    ];
}
