<?php

namespace App\Http\Controllers;

use App\Models\Task;

class SearchController extends Controller
{

    public function index()
    {
        // Get search term from URL
        $filters = request()->only(['q']);

        // Return search view
        return view('search', [
            'tasks' => Task::query()->
            with(['label'])->
            where('tasks.user_id', '=', auth()->id())->
            where('tasks.title', 'like', "%{$filters['q']}%")->
            orderBy('due_date', 'asc')->
            get(),
            'filters' => $filters,
        ]);
    }

}
