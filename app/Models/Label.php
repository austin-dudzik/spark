<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Label extends Model
{

    protected $fillable = [
        'name',
        'color',
        'user_id'
    ];

}
