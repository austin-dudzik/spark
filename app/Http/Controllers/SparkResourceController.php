<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SparkResourceController extends Controller
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
                orderBy('due_date', 'asc')->
                get(),
            ]);


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Redirect to index (we don't use this)
        return redirect('/tasks');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     */
    public function store(Request $request)
    {

        // Validate the request
        $fields = $request->validateWithBag('create', [
            'title' => 'required',
            'description' => 'present',
            'label_id' => 'integer|min:0',
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
     * Display the specified resource.
     *
     * @param Task $task
     */
    public function show(Task $task): Task
    {
        // Return the task
        return $task;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        // Redirect to index (we don't use this)
        return redirect('/tasks');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Task $task
     */
    public function update(Request $request, Task $task)
    {

        //dd($request->all());

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
            //dd($request->status);



        } else {
            $fields = $request->validateWithBag('form_' . $task->id, [
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
