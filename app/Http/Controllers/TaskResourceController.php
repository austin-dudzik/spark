<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TaskResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {

        $filters = request()->only(['q', 'l', 'completed']);

            // Return home view
            return view('home', [
                // Grab all tasks for the current user
                'tasks' => Task::filter($filters)->
                with(['label'])->
                where('tasks.user_id', '=', Auth::user()->id)->
                whereNull('tasks.completed')->
                orderBy(DB::raw('ISNULL(due_date), due_date'), 'ASC')->
                get(),
            ]);


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     */
    public function store(Request $request)
    {

        // Validate the request
        $fields = $request->validateWithBag('new_task', [
            'title' => 'required',
            'description' => 'present',
            'label_id' => 'integer|min:0|nullable',
            'due_date' => 'date|nullable',
        ]);

        // Assign the user ID to the request
        $fields['user_id'] = Auth::user()->id;

        // Create the task
        Task::create($fields);

        // Redirect to index with success
        return redirect()->back()->with('success', 'Task created successfully');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Task $task
     */
    public function update(Request $request, Task $task)
    {

        // Find existing task
        $currentTask = Task::find($task->id);

        // If task status is changed
        if ($request->has('sub_status')) {
            $status = $request->status ? 1 : 0;

            if($status === 1) {
                $currentTask->update(['completed' =>  Carbon::now()->toDateTimeString()]);
            } elseif($status === 0) {
                $currentTask->update(['completed' =>  null]);
            }


        } else {
            $fields = $request->validateWithBag('edit_task_' . $task->id, [
                'title' => 'required',
                'description' => 'present',
                'due_date' => 'required'
            ]);
            // Update the task
            $currentTask->update($fields);
        }

        // Redirect to index with success
        return redirect()->back()->with('success', 'Task updated successfully');

    }

    /**
     * Remove the specified task from storage.
     *
     * @param Task $task
     */
    public function destroy(Task $task)
    {
        // Find existing task
        $toDelete = Task::find($task->id);

        // Delete the task
        $toDelete->delete();

        // Redirect to index with success
        return redirect('/tasks')->with('success', 'Task deleted successfully');
    }
}
