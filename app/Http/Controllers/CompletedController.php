<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Traits\ViewSorter;
use App\Models\Task;

class CompletedController extends Controller
{

    use ViewSorter;

    /**
     * Display a list of all completed tasks
     *
     */
    public function index()
    {
        // Return the completed view
        return view('completed', [
            'tasks' => Task::query()->
            with(['label'])->
            where('user_id', '=', Auth::id())->
            whereNotNull('completed')->
            orderBy($this->getSorters()->sort_by, $this->getSorters()->order_by)->
            get(),
        ]);
    }

}
