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
        return Socialite::driver('facebook')->redirect();   
        
    }    /**
     * Return a callback method from facebook api.
     *
     * @return callback URL from facebook
     */
    public function callback(SocialFacebookAccount $service)
    {
      return  $user = Socialite::driver('facebook')->user();
        $user = $service->createOrGetUser(Socialite::driver('facebook')->user());

    //    print_r($user);die;

        auth()->login($user);



        return redirect()->to('/home');
        // return "yes";
    }
}