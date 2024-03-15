<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class ProviderController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }


    public function callback($provider)
    {
        try {
            $SocialUser = Socialite::driver($provider)->user();

            $user = User::where([
                'email' => $SocialUser->getEmail(),
                'provider' => $provider,
            ])->first();
                
            if (!$user) {
                if (User::where('email', $SocialUser->getEmail())->exists()) {
                    return redirect(to: '/login')->withErrors(['email' => trans('auth.taken')]);
                }

                $user = User::create([
                    'name'              => $SocialUser->getName(),
                    'email'             => $SocialUser->getEmail(),
                    'is_active'         => true,
                    'provider'          => $provider,
                    'provider_id'       => $SocialUser->getId(),
                    'provider_token'    => $SocialUser->token,
                    'email_verified_at' => now(),
                ]);
                // Assign the "user" role
                $user->assignRole('user');
            }
            
            Auth::login($user);
            return redirect('/dashboard');

        } catch (\Exception $e) {
            return redirect(to: '/login');
        }
    }


}