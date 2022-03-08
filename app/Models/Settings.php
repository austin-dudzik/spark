<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Settings Model
 *
 * @property  string $title
 *
 */
class Settings extends Model
{

    protected $fillable = [
        'theme'
    ];

}
