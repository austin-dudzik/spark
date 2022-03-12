<?php

namespace App\Models;

use Carbon\Carbon;
use DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

/**
 * Task Model
 *
 * @property  string $title
 *
 */
class Task extends Model
{

    // Fillable
    protected $fillable = [
        'title',
        'description',
        'user_id',
        'label_id',
        'status',
        'completed',
        'due_date'
    ];

    // Dates
    protected $dates = [
        'due_date',
        'completed'
    ];

    // Casts
    protected $casts = [
        'status' => 'integer'
    ];

    public static function schedule($page = 1)
    {
        $start = new DateTime();
        $start->modify('+' . (($page - 1) * 14) . ' days');
        $end = new DateTime();
        $end->modify('+' . ($page * 14) . ' days');

        return static::query()
            ->with(['label'])
            ->where('user_id', '=', Auth::id())
            ->whereBetween('due_date', [$start->format('Y-m-d'), $end->format('Y-m-d')])
            ->whereNull('completed')
            ->orderBy('due_date', 'desc')
            ->get()
            ->groupBy(function ($task) {
                return Carbon::parse($task->due_date)->format('Y-m-d');
            }
            );

    }

    public function label()
    {
        return $this->hasOne(Label::class, 'id', 'label_id');
    }

}
