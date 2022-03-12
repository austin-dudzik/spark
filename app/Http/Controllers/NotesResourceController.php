<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Note;
use Illuminate\Http\Request;

class NotesResourceController extends Controller
{
    /**
     * Display a list of notes
     *
     */
    public function index()
    {
        // Return notes view
        return view('notes', [
            'notes' => Note::query()->
            where('user_id', '=', Auth::id())->
            get()
        ]);
    }

    /**
     * Store a new note in the database
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
        $fields['user_id'] = Auth::id();

        // Create the note
        Note::query()->create($fields);

        // Redirect back
        return redirect()->back();
    }

    /**
     * Update the specified note in the database
     *
     * @param Request $request
     * @param Note $note
     */
    public function update(Request $request, Note $note)
    {
        // Validate the request
        $fields = $request->validateWithBag('edit_note_' . $note->id, [
            'color' => 'required',
            'content' => 'required'
        ]);
        // Update the note
        Note::query()->find($note->id)->update($fields);

        // Redirect back
        return redirect()->back();
    }

    /**
     * Remove the specified note from the database
     *
     * @param Note $note
     */
    public function destroy(Note $note)
    {
        // Find and delete existing label
        Note::query()->find($note->id)->delete();

        // Redirect back
        return redirect()->back();
    }
}
