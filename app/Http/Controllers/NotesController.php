<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class NotesController extends Controller
{

    public function index()
    {

        $filters = request()->only(['q', 'l', 'completed']);

        // Return home view
        return view('search', [
            // Grab all tasks for the current user
            'tasks' => Task::filter($filters)->
            with(['label'])->
            where('tasks.user_id', '=', Auth::user()->id)->
            where('tasks.title', 'like', "%{$filters['q']}%")->
            orderBy('due_date', 'asc')->
            get(),
            'filters' => $filters
        ]);


    }

}
