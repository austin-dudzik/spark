<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Note Model
 *
 * @property  string $title
 *
 */
class Note extends Model
{

    protected $fillable = [
        'user_id',
        'color',
        'content'
    ];
}