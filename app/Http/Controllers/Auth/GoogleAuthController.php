<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        $google = Socialite::driver('google')->user();

        // Fetch additional data from google user
        $googleUser = $google->user;
        $googleAttributes = $google->attributes;

        $user = User::firstOrCreate([
            'email' => $google->email,
        ], [
            'name' => $google->name,
            'google_id' => $google->id,
            'email_verified_at' => $googleUser['email_verified'],
            'password' => $google->name,
            'avatar' => $googleAttributes['avatar_original'],
        ]);

        Auth::login($user);

        return redirect('/profile');
    }
}
