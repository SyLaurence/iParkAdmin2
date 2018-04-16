<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserInfo;

class LoginController extends Controller
{
    public function index(){
    	return view('welcome');
    }
    public function check(Request $request){
		$username = $request['uname'];
	    $pass = $request['pass'];
	    $User = UserInfo::where('username', $username)->get();
	    if($User != '[]'){
	         $passFromDB = $User->first()->password;
	        if ($pass == $passFromDB) {
	            // The passwords match...
	            session([ 
	            	'username' => $username,
	            	'privilege' => $User->first()->privilege,
	            	'id' => $User->first()->id
	            ]);
	            
	        	if($request->ajax()){
		            return 1;
		        }
	        } else {
	            return 0;
	        }
	   } else {
	        return 0;
	   }
    }

    public function logout(){
        session()->flush();
        return redirect('/');
    }

}
