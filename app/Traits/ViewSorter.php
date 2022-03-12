<?php

namespace App\Traits;

use App\Models\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

trait ViewSorter
{

    protected function getSorters() {

        // Get the user view
        $view = View::query()->
        where('user_id', '=', Auth::id())->
        first();

        // Determine column sort
        $view->sort_by = match ($view->sort_by) {
            'alphabetically' => 'title',
            'date_added' => 'created_at',
            'date_updated' => 'updated_at',
            default => DB::raw('ISNULL(due_date), due_date'),
        };

        return $view;

    }
}
