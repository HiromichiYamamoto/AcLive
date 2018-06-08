<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\LinkedSocialAccount;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use DB;
use Socialite;
use App\SocialAccount;

class SocialController extends Controller
{
    protected $redirectTo = '/';        //your-redirect-url-after-login

    // Line

    public function getLineAuth()
    {
        return Socialite::driver('line')->redirect();
    }

    public function getLineAuthCallback()
    {
        $lineUser = Socialite::driver('line')->stateless()->user(); // (1)

        $user = $this->createOrGetUser($lineUser, 'line');

        Auth::login($user, true);

        return redirect($this->redirectTo);
    }

    // twitter

//    public function getTwitterAuth()
//    {
//        return Socialite::driver('twitter')->redirect();
//    }
//
//    public function getTwitterAuthCallback()
//    {
//        $twitterUser = Socialite::driver('twitter')->user();
//
//        $user = $this->createOrGetUser($twitterUser, 'twitter');
//        Auth::login($user, true);
//
//        return redirect($this->redirectTo);
//    }

    // facebook

//    public function getFacebookAuth()
//    {
//        return Socialite::driver('facebook')->redirect();
//    }

//    public function getFacebookAuthCallback()
//    {
//        $facebookUser = Socialite::driver('facebook')->stateless()->user(); // (1)
//
//        $user = $this->createOrGetUser($facebookUser, 'facebook');
//        Auth::login($user, true);
//
//        return redirect($this->redirectTo);
//    }

    public function createOrGetUser($providerUser, $provider)
    {
        $account = LinkedSocialAccount::firstOrCreate([
            'provider_user_id' => $providerUser->getId(),
            'provider' => $provider,
        ]);

        if (empty($account->user))
        {
            $user = User::create([
                'nickname'   => $providerUser->getName(),
//                'email'  => $providerUser->getEmail(), # 削除 (2017.05.19)
                'avatar' => $providerUser->getAvatar(),
            ]);
            $account->user()->associate($user);
        }
        $account->provider_access_token = $providerUser->token;
        $account->save();

        return $account->user;
    }
}