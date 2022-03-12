<?php

namespace App\Http\Controllers;

use App\Traits\ViewSorter;
use App\Models\Label;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LabelsResourceController extends Controller
{

    use ViewSorter;

    /**
     * Display a list of all labels
     *
     */
    public function index()
    {
        // Return labels view
        return view('labels', [
            'labels' => Label::query()->
            with(['tasks'])->
            where('user_id', '=', Auth::id())->
            get()
        ]);
    }

    /**
     * Store a new label in the database
     *
     * @param Request $request
     */
    public function store(Request $request)
    {
        // Validate the request
        $fields = $request->validateWithBag('new_label', [
            'name' => 'required',
            'color' => 'required',
        ]);

        // Assign the user ID to the request
        $fields['user_id'] = Auth::id();

        // Create the label
        Label::query()->create($fields);

        // Redirect back
        return redirect()->back();
    }

    /**
     * Display the specified label
     *
     * @param Label $label
     */
    public function show(Label $label)
    {
        // Return the single label view
        return view('label-single', [
            'label' => Label::query()->
            where('user_id', '=', Auth::id())->
            where('id', '=', $label->id)->
            first(),
            'tasks' => Task::query()->
            where('user_id', '=', Auth::id())->
            where('label_id', '=', $label->id)->
            whereNull('completed')->
            orderBy($this->getSorters()->sort_by, $this->getSorters()->order_by)->
            get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Label $label
     */
    public function update(Request $request, Label $label)
    {
        // Validate the request
        $fields = $request->validateWithBag('edit_label_' . $label->id, [
            'name' => 'required',
            'color' => 'required',
        ]);

        // Update the label
        Label::query()->find($label->id)->update($fields);

        // Redirect to index with success
        return redirect()->back();
    }

    /**
     * Remove the specified label from storage.
     *
     * @param Label $label
     */
    public function destroy(Label $label)
    {
        // Find and delete existing label
        Label::query()->find($label->id)->delete();

        // Remove label from tasks
        Task::query()->
        where('label_id', '=', $label->id)->
        update(['label_id' => null]);

        // Redirect to index
        return redirect()->back();
    }
}
