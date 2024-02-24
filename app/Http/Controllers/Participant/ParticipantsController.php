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
     * User details added database
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
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

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
