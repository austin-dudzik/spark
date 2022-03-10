<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Label extends Model
{

    public function tasks()
    {
        return $this->hasMany(Task::class, 'label_id', 'id')->whereNull('completed');
    }

    protected $fillable = [
        'name',
        'color',
        'user_id'
    ];

}
