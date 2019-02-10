<?php

namespace App\Http\Controllers;

use Socialite;
use Illuminate\Http\Request;
use App\Services\SocialFacebookAccountService;

class FacebookLoginController extends Controller
{


  public function redirect()
{
   return Socialite::driver('facebook')->redirect();
}

    /**
    * Return a callback method from facebook api.
    *
    * @return callback URL from facebook
    */
    public function callback(SocialFacebookAccountService $service)
    {
        $user = $service->createOrGetUser(Socialite::driver('facebook')->user());
        auth()->login($user);
        return redirect()->to('/');
    }
}
