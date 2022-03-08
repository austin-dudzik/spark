<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the profile page.
     *
     * @return Renderable
     */
    public function index(): Renderable
    {

        $completedTasks = Task::where('user_id', Auth::id())->where('status', 1)->count();

        return view('profile', [
            'completedTasks' => $completedTasks
        ]);
    }

}
