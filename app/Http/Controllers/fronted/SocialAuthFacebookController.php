<?php
namespace App\Http\Controllers\fronted;

use App\Http\Controllers\Controller;
use Socialite;

use App\Models\admin\SocialFacebookAccount;

class SocialAuthFacebookController extends Controller
{
  /**
   * Create a redirect method to facebook api.
   *
   * @return void
   */
    public function redirect()
    {
        // return "true";
        return Socialite::driver('facebook')->redirect();   
    }    /**
     * Return a callback method from facebook api.
     *
     * @return callback URL from facebook
     */
    public function callback(SocialFacebookAccount $service)
    {
        return "true";
        $user = $service->createOrGetUser(Socialite::driver('facebook')->user());
        auth()->login($user);
        return redirect()->to('/home');
    }
}