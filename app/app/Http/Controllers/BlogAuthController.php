<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Auth;
use Redirect;
use Session;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\LoginPostRequest;
use App\Models\Users;

class BlogAuthController extends Controller
{

    public function login()
    {
    	if (Session::get('loginValidated') === 'yes') {
    		return redirect(url('dashboard'));
    	}
    	else {
    		$title = 'Blog login';
        	echo view('header.header', compact('title'));
        	echo view('blog.auth.login');
        	echo view('footer.footer');
    	} 	
    }


    public function logout()
    {
    	Session::flush();
    	return redirect(url('login'));
    }


    public function login_auth(LoginPostRequest $request) 
    {

    	$validated = $request->validated();

    	if ($validated) {
    		$username 	 = $request->username;
			$password 	 = $request->password;
			$userExists = Users::where('login', '=', $username)->count();

			if ($userExists > 0) {

				$userDetails = DB::table('users')
	            ->select('id as user_id', 'user_fname', 'user_lname', 'password')
	            ->where('login', '=', $username)
	            ->first();

	            if (Hash::check($password, $userDetails->password)) {
	            	Session::put('userId', $userDetails->user_id);
	            	Session::put('userFname', $userDetails->user_fname);
	            	Session::put('userLname', $userDetails->user_lname);
	            	Session::put('loginValidated', 'yes');

	            	return redirect('/dashboard');
	            }
	            else {
	            	return back()->withError('Wrong username/password');
	            }
			}
			else {
				return back()->withError('Unknown username');
			}
    	}
    }

}
