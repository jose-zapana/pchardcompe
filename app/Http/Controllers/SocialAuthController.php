<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    public function redirectToProvider( $provider )
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback( $provider )
    {
        $social_user = Socialite::driver($provider)->user();
        if ( $user = User::where('email', $social_user->getEmail())->get() )
        {
            return $this->loginAndRedirect($user);
        } else {
            $user = User::create([
                'name' => $social_user->getName(),
                'email' => $social_user->getEmail(),
                'image' => $social_user->getAvatar()
            ]);
            return $this->loginAndRedirect($user);
        }

    }

    public function loginAndRedirect( $user )
    {
        Auth::login($user);
        return redirect()->to('/home');
    }
}
