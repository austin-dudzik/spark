<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Note Model
 *
 * @property  string $title
 *
 */
class View extends Model
{

    protected $fillable = [
        'user_id',
        'sort_by',
        'order_by',
        'task_view'
    ];
}
