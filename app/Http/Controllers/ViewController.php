<?php

namespace App\Http\Controllers;

use App\Models\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViewController extends Controller
{

    public function update(Request $request)
    {
        // Validate the form
        $request->validateWithBag('view', [
            'sort_by' => ['required',],
            'order' => ['required'],
            'view' => ['required'],
        ]);

        // Update the user's view
        View::query()->find(Auth::id())->update([
            'sort_by' => $request->sort_by,
            'order_by' => $request->order,
            'task_view' => $request->view
        ]);

        // Redirect back
        return redirect()->back();
    }

}
