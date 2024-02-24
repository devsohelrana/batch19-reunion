<?php

namespace App\Http\Controllers\Participant;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\ParticipantDetails;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ParticipantsController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function index(): View
    {
        $user = Auth::user();

        $userId = $user->id;
        $user = User::findOrFail($userId);

        $details = $user->ParticipantDetails()->first();

        return view('user.profile', compact('user', 'details'));
    }

    /**
     * Participant avatar update
     */
    public function update(Request $request)
    {
        try {
            $request->validate([
                'avatar' => 'image|mimes:jpeg,png,jpg,gif|max:1024',
            ]);

            $user = Auth::user();

            if ($request->hasFile('avatar')) {

                $file = $request->file('avatar');
                $fileName = $user->name . '.' . $file->getClientOriginalExtension();
                $path = 'upload/user/';
                $filePath = $request->avatar->move($path, $fileName);


                // Store the avatar in the storage/app/public/avatars directory
                // $avatarPath = $request->file('avatar')->store('public/avatars');

                // Update the avatar column in the users table
                $user->avatar = $filePath;
                $user->save();
            }
            // Success message
            return back()->with('status', 'avatar-success');
        } catch (\Exception $e) {
            // Error message
            return back()->with('status', 'avatar-error');
        }
    }

    /**
     * Participant details added database
     */
    public function details(Request $request)
    {
        try {
            $user = Auth::user();

            $ParticipantDetails = $request->validate([
                'name' => 'required',
                'phoneNumber' => 'required|digits:11',
                'gender' => 'required',
                'group' => 'required',
                'marital_status' => 'required',
                'division' => 'required',
                'district' => 'required',
                'upazila' => 'required',
                'thana' => 'required',
            ]);

            // dd($ParticipantDetails);

            $user->ParticipantDetails()->updateOrCreate(
                ['user_id' => $user->id],
                $ParticipantDetails
            );

            // Success message
            return redirect('/payment')->with('status', 'detail-success');
        } catch (\Exception) {
            // Error message
            return redirect()->back()->with('status', 'detail-error');
        }
    }

    /**
     * Update the user's profile information.
     */
    // public function update(ProfileUpdateRequest $request): RedirectResponse
    // {
    //     $request->user()->fill($request->validated());

    //     if ($request->user()->isDirty('email')) {
    //         $request->user()->email_verified_at = null;
    //     }

    //     $request->user()->save();

    //     return Redirect::route('profile.edit')->with('status', 'profile-updated');
    // }

    // participants list
    public function participants()
    {
        $user = Auth::user();

        $userId = $user->id;
        $user = User::findOrFail($userId);

        $details = $user->ParticipantDetails()->first();

        $participants = User::all();

        return view('user.participants', compact('user', 'details', 'participants'));
    }

    /**
     * Delete the user's account.
     */
    // public function destroy(Request $request): RedirectResponse
    // {
    //     $request->validateWithBag('userDeletion', [
    //         'password' => ['required', 'current_password'],
    //     ]);

    //     $user = $request->user();

    //     Auth::logout();

    //     $user->delete();

    //     $request->session()->invalidate();
    //     $request->session()->regenerateToken();

    //     return Redirect::to('/');
    // }
}
