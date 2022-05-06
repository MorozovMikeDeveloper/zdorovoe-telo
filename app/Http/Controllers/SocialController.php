<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use App\Service\SocialService;

class SocialController extends Controller
{
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        $socialService = new SocialService();
        $socialiteUser = Socialite::driver($provider)->user();
        $user = $socialService->findOrCreateUser($provider, $socialiteUser);

        auth()->login($user, true);

        return redirect('/');
    }
}
