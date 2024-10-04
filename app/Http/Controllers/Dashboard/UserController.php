<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class UserController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

  
    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();
            $user = $this->findOrCreateUser($googleUser);

            Auth::login($user, true);

            return redirect()->route('dashboard.posts.index'); 
        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Unable to login using Google. Please try again.');
        }
    }

    
    public function findOrCreateUser($googleUser)
    {
        $user = User::where('google_id', $googleUser->id)->first();

        if ($user) {
            return $user;
        }

        // If user does not exist, create a new user
        return User::create([
            'name' => $googleUser->name,
            'email' => $googleUser->email,
            'google_id' => $googleUser->id,
            'login_type' => "google",
        ]);
    }
}
