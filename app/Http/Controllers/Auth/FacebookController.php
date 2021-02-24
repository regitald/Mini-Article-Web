<?php


namespace App\Http\Controllers\Auth;


use App\User;
use App\Http\Controllers\Controller;
use Validator;
use Socialite;
use Exception;
use Auth;
use App\Models\Member\MemberModel;

class FacebookController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function facebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function loginWithFacebook()
    {
        try {
            $user = Socialite::driver('facebook')->user();
            
            $check = MemberModel::where('facebook_id', $user->getId())->first();
            if(!empty($check)){
                return redirect()->route('/');
            }else{
                $create['fullname'] = $user->getName();
                $create['email'] = $user->getEmail();
                $create['facebook_id'] = $user->getId();
    
                $save = MemberModel::create($create);
                Auth::loginUsingId($createdUser->id);
    
    
                return redirect()->route('/');
            }


        } catch (Exception $e) {


            return redirect('auth/facebook');


        }
    }
}