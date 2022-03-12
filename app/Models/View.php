<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * View Model
 *
 * @property  string $title
 *
 */
class View extends Model
{
    // Fillable
    protected $fillable = [
        'user_id',
        'sort_by',
        'order_by',
        'task_view'
    ];
}
