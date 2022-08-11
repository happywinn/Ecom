<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\GoogleAuthController;
use App\Models\User;
use Auth;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
    	return Socialite::driver('google')->stateless()->redirect();
    }


    public function callbackGoogle()
    {
    	try {
    		$google_user = Socialite::driver('google')->stateless()->user();
    		$user = User::where('google_id',$google_user->getId())->first();

    		if(!$user)
    		{
    			$new_user = User::create([
    				'id' => User::generateUserid(),
    				'name' => $google_user->getName(),
    				'email' => $google_user->getEmail(),
    				'google_id' => $google_user->getId(),
    			]);

    			Auth::login($new_user);
    			return redirect('/');
    		}
    		else {
    			Auth::login($user);
    			return redirect('/');

    		}
    	} catch (Exception $e) {
    		dd('Someting went wrong!'.$e->getMessage());
    	}
    }
}
