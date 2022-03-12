<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Task;
use Carbon\Carbon;

class ScheduleController extends Controller
{

    public function index()
    {
        $page = request('page', 1);

        if ($page == 1) {
            return view('schedule', [
                'days' => Task::schedule($page),
                'page' => $page,
                'overdue' => Task::query()->
                where('due_date', '<', Carbon::today())->
                whereNull('completed')->
                where('user_id', '=', Auth::id())->
                get(),
            ]);
        } else {
            return view('schedule-list', [
                'days' => Task::schedule($page),
                'page' => $page
            ]);
        }

    }


}
