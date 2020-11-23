<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Service\Socialite;

class SocialController extends Controller
{
    public function redirectToProviderVK()
    {
        return \Laravel\Socialite\Facades\Socialite::driver('vkontakte')->redirect();
    }

    public function handlerProviderCallbackVK()
    {
        $user = Socialite::driver('vkontakte')->user();
        $objSocialite = new Socialite();
        $objSocialite->saveUser($user);

        redirect()->route('login');
    }
}
