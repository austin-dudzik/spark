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

class SettingsController extends Controller
{

    /**
     * Show the settings page.
     *
     * @return Renderable
     */
    public function index(): Renderable
    {
        // Return settings view
        return view('settings');
    }

    public function updateGoals(Request $request)
    {
        // Validate the form
        $request->validateWithBag('settings_goals', [
            'daily_goal' => ['required', 'min:0', 'max:999'],
            'weekly_goal' => ['required', 'min:0', 'max:999'],
        ]);

        // Update the user's goals
        User::query()->update(['daily_goal' => $request->daily_goal, 'weekly_goal' => $request->weekly_goal]);

        // Redirect with success
        return redirect('/settings')->with('success', 'Success, your goals have been updated.');
    }

    public function updateTheme(Request $request)
    {
        // Update user theme
        User::query()->update(['theme' => $request->theme]);

        // Redirect with success
        return redirect('settings')->with('success', 'Success, theme updated.');
    }

    public function updateAccount(Request $request)
    {
        // Validate form
        $fields = $request->validateWithBag('form_settings', [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . Auth::id()],
        ]);

        // Update the account
        User::query()->update($fields);

        // Redirect with success
        return redirect('settings')->with('success', 'Success, your account has been updated.');
    }

    public function updatePassword(Request $request)
    {
        // Validate the form
        $request->validateWithBag('form_password', [
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        // Update the user's password
        User::query()->update(['password' => bcrypt($request->new_password)]);

        // Redirect with success
        return redirect('settings')->with('success', 'Success, your password has been updated.');
    }

    public function deleteAccount()
    {

        // Delete account data
        Task::query()->where('user_id', Auth::id())->delete();
        Note::query()->where('user_id', Auth::id())->delete();
        Label::query()->where('user_id', Auth::id())->delete();

        // Delete the account
        User::query()->delete();

        // Log the user out
        Auth::logout();

        // Redirect to log in
        return redirect('/login');
    }


}
