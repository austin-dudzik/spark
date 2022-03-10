<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotesResourceController extends Controller
{
    /**
     * Display a listing of notes.
     *
     */
    public function index()
    {

        // Return notes view
        return view('notes', [
            'notes' => Note::query()->
            where('user_id', '=', Auth::user()->id)->
            get()
        ]);


    }

    /**
     * Store a newly created note in storage.
     *
     * @param Request $request
     */
    public function store(Request $request)
    {

        // Validate the request
        $fields = $request->validateWithBag('new_note', [
            'color' => 'required',
            'content' => 'required',
        ]);

        // Assign the user ID to the request
        $fields['user_id'] = Auth::user()->id;

        // Create the task
        Note::query()->create($fields);

        // Redirect to index with success
        return redirect()->back()->with('success', 'Note created successfully');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Note $note
     */
    public function update(Request $request, Note $note)
    {

            $fields = $request->validateWithBag('edit_note_' . $note->id, [
                'color' => 'required',
                'content' => 'required'
            ]);
            // Update the note
            Note::find($note->id)->update($fields);

        // Redirect to index with success
        return redirect()->back()->with('success', 'Note updated successfully');

    }

    /**
     * Remove the specified note from storage.
     *
     * @param Note $note
     */
    public function destroy(Note $note)
    {
        // Find and delete existing label
        Note::find($note->id)->delete();

        // Redirect to index with success
        return redirect('/notes')->with('success', 'Note deleted successfully');
    }
}
