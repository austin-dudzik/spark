<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use App\Models\User;
use App\Rules\MatchOldPassword;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

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

            // Delete the account
            User::find(Auth::user()->id)->delete();

            // Redirect with success
            return redirect('settings')->with('success', 'Success, your account has been deleted.');
        }

    }

}
