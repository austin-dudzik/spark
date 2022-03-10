<?php

namespace App\Http\Controllers;

use App\Models\Label;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LabelsResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {

        // Return labels view
        return view('labels', [
            'labels' => Label::query()->with(['tasks'])->
            where('user_id', '=', Auth::user()->id)->
            get()
        ]);


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Redirect to index (we don't use this)
        return redirect('/');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     */
    public function store(Request $request)
    {

        // Validate the request
        $fields = $request->validateWithBag('create_label', [
            'name' => 'required',
            'color' => 'required',
        ]);

        // Assign the user ID to the request
        $fields['user_id'] = Auth::user()->id;

        // Create the task
        Label::query()->create($fields);

        // Redirect to index with success
        return redirect()->back()->with('success', 'Label created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param Label $label
     */
    public function show(Label $label)
    {
        // Return the task
        return view('label-single', [
            'label' => Label::query()->
            where('user_id', '=', Auth::user()->id)->
            where('id', '=', $label->id)->
            first(),
            'tasks' => Task::query()->
            where('user_id', '=', Auth::user()->id)->
            where('label_id', '=', $label->id)->
            whereNull('completed')->
            get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        // Redirect to index (we don't use this)
        return redirect('/labels');
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
     * @param Label $label
     */
    public function destroy(Label $label)
    {
        // Find and delete existing label
        $toDelete = Label::find($label->id)->delete();

        // Redirect to index with success
        return redirect('/labels')->with('success', 'Label deleted successfully');
    }
}
