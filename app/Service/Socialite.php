<?php

namespace App\Service;

use App\Models\User;

class Socialite
{
    public function saveUser($user)
    {
        $email = $user->getEmail();
        $model = User::where('email', $email)->first();

        if ($model) {
            $model->saveSocialUser(['email' => $email, 'name' => $user->getName()]);
            if ($user) {
                \Auth::loginUsingId($model->id);
            }
        }

        return true;
    }
}
