<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CompletedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {

            return view('completed', [
                // Grab all tasks for the current user
                'tasks' => Task::with(['label'])->
                where('tasks.user_id', '=', Auth::user()->id)->
                whereNotNull('tasks.completed')->
                get()
            ]);


    }

}
