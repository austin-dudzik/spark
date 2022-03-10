<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Show the profile page.
     *
     * @return Renderable
     */
    public function index(): Renderable
    {

        $completedTasks = Task::where('user_id', Auth::id())->whereNotNull('completed')->count();

        return view('profile', [
            'completedTasks' => $completedTasks
        ]);
    }

}
