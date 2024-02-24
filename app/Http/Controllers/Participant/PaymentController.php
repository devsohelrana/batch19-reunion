<?php

namespace App\Http\Controllers\Participant;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{

    // participants payment
    public function index()
    {
        $user = Auth::user();

        $userId = $user->id;
        $user = User::findOrFail($userId);

        $details = $user->ParticipantDetails()->first();

        return view('user.payment', compact('user', 'details'));
    }
}
