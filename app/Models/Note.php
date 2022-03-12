<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Note Model
 *
 */
class Note extends Model
{

    // Fillable
    protected $fillable = [
        'user_id',
        'color',
        'content'
    ];

}
