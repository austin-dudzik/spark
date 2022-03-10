<?php

namespace App\Http\Controllers;

use App\Models\Label;
use App\Models\Note;
use App\Models\Task;
use App\Models\User;
use App\Rules\MatchOldPassword;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{

    /**
     * Show the settings page.
     *
     * @return Renderable
     */
    public function index(): Renderable
    {
        return view('settings');
    }

    public function update(Request $request)
    {

        if ($request->type === "password") {

            // Validate the form
            $request->validateWithBag('form_password', [
                'current_password' => ['required', new MatchOldPassword],
                'new_password' => ['required', 'string', 'min:8', 'confirmed']
            ]);

            // Update the user's password
            User::find(Auth::user()->id)->update(['password' => Hash::make($request->new_password)]);

            // Redirect with success
            return redirect('settings')->with('success', 'Success, your password has been updated.');


        }

        elseif ($request->type === "theme") {

            // Update user theme
            User::find(Auth::user()->id)->update(['theme' => $request->theme]);

            // Redirect with success
            return redirect('settings')->with('success', 'Success, theme updated.');

        }

        elseif ($request->type === "account") {

            // Validate form
            $fields = $request->validateWithBag('form_settings', [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.Auth::user()->id],
            ]);

            // Update the account
            User::find(Auth::user()->id)->update($fields);

            // Redirect with success
            return redirect('settings')->with('success', 'Success, your account has been updated.');
        }

        elseif ($request->type === "delete") {

            // Delete account data
            Task::query()->where('user_id', Auth::user()->id)->delete();
            Note::query()->where('user_id', Auth::user()->id)->delete();
            Label::query()->where('user_id', Auth::user()->id)->delete();

            // Delete the account
            User::query()->find(Auth::user()->id)->delete();

            // Log the user out
            Auth::logout();

            // Redirect to log in
            redirect('/login');
        }

    }

}
