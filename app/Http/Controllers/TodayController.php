<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TodayController extends Controller
{

    public function index()
    {

        // Return today view
        return view('today', [
            // Grab all tasks for the current user
            'tasks' => Task::query()->
            with(['label'])->
            where('tasks.user_id', '=', Auth::user()->id)->
            whereNull('tasks.completed')->
            whereDate('due_date', '=', Carbon::today())->
            orderBy(DB::raw('ISNULL(due_date), due_date'), 'ASC')->
            get(),
            'overdue' => Task::query()->
            where('due_date', '<', Carbon::today())->
            whereNull('completed')->
            where('user_id', '=', Auth::user()->id)->
            get(),
        ]);


    }

}
