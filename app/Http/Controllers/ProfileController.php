<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Support\Renderable;
use App\Models\Label;
use App\Models\Note;
use App\Models\Task;
use Carbon\Carbon;

class ProfileController extends Controller
{
    /**
     * Show the profile page
     *
     * @return Renderable
     */
    public function index(): Renderable
    {

        $completedTasks = Task::query()->
        where('user_id', Auth::id())->
        whereNotNull('completed')->
        count();

        $overdueTasks = Task::query()->
        where('user_id', Auth::id())->
        where('due_date', '<', Carbon::today())->
        whereNull('completed')->
        count();

        $totalTasks = Task::query()->
        where('user_id', Auth::id())->
        count();

        $notes = Note::query()->
        where('user_id', Auth::id())->
        count();

        $labels = Label::query()->
        where('user_id', Auth::id())->
        count();

        return view('profile', [
            'completedTasks' => $completedTasks,
            'overdueTasks' => $overdueTasks,
            'totalTasks' => $totalTasks,
            'totalNotes' => $notes,
            'totalLabels' => $labels,
        ]);
    }

}
