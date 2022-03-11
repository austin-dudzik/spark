<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Traits\ViewSorter;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskResourceController extends Controller
{

    use ViewSorter;

    /**
     * Display the Inbox view
     *
     */
    public function index()
    {

        // Return sorted view
        return view('home', [
            // Grab all tasks for the current user
            'tasks' => Task::query()->
            with(['label'])->
            where('tasks.user_id', '=', Auth::user()->id)->
            whereNull('tasks.completed')->
            orderBy($this->getSorters()->sort_by, $this->getSorters()->order_by)->
            get(),
        ]);

    }

    /**
     * Store a new task in the database
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

        // Redirect back
        return redirect()->back();
    }

    /**
     * Update a task in the database
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
            $currentTask->update(['completed' => ($status === 1 ? Carbon::now()->toDateTimeString() : null)]);
        } else {
            $fields = $request->validateWithBag('edit_task_' . $task->id, [
                'title' => 'required',
                'description' => 'present',
                'due_date' => 'required'
            ]);
            // Update the task
            $currentTask->update($fields);
        }

        // Redirect back
        return redirect()->back();

    }

    /**
     * Delete a task from the database
     *
     * @param Task $task
     */
    public function destroy(Task $task)
    {
        // Find and delete the task
        Task::find($task->id)->delete();

        // Redirect back
        return redirect('/tasks');
    }
}
