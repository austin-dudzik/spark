<?php

namespace App\Http\Middleware;

use App\Models\Label;
use App\Models\Task;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SharedViewData
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check()) {
            view()->share('inboxTasks', Task::query()->where('tasks.user_id', '=', Auth::user()->id)->
            whereNull('tasks.completed')->get());
            view()->share('labels', Label::query()->
            with(['tasks'])->
            where('user_id', '=', Auth::user()->id)->
            get());
            view()->share('tasksToday', Task::query()->whereDate('completed', Carbon::today())->where('user_id', '=', Auth::user()->id)->get());
        }


        return $next($request);
    }
}
