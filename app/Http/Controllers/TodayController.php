<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Traits\ViewSorter;

class TodayController extends Controller
{

    use ViewSorter;

    public function index()
    {
        // Return today view
        return view('today', [
            'tasks' => Task::query()->
            with(['label'])->
            where('user_id', '=', Auth::id())->
            whereNull('completed')->
            whereDate('due_date', '=', Carbon::today())->
            orderBy($this->getSorters()->sort_by, $this->getSorters()->order_by)->
            get(),
            'overdue' => Task::query()->
            where('due_date', '<', Carbon::today())->
            whereNull('completed')->
            where('user_id', '=', Auth::id())->
            orderBy($this->getSorters()->sort_by, $this->getSorters()->order_by)->
            get(),
        ]);
    }

}
