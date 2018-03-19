<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user_info;
use App\UserLevel;

class UserController extends Controller
{
    public function index()
    {
        $users = user_info::all()->first()->park_id;
        return $users;
        //$levels = UserLevel::all();
        //return view('User.user',compact('users','levels'));
    }

    public function add(Request $request){

        $user = new UserInfo;

        $user->name = $request->user['tname'];
        $user->comp_name = $request->user['tcomp'];
        $user->ipadd = $request->user['tip'];
        $user->loop_status = $request->user['tloop'];
        $user->type = $request->user['ttype'];
        $user->save();

        if($request->ajax()){
            return 0;
        }
    }

    public function toEdit(Request $request){

        $user = UserInfo::find($request->user['tid']);
        $user->name = $request->user['tname'];
        $user->comp_name = $request->user['tcomp'];
        $user->ipadd = $request->user['tip'];
        $user->loop_status = $request->user['tloop'];
        $user->type = $request->user['ttype'];
        $user->save();


        if($request->ajax()){
            return 0;
        }
    }

    public function delete(Request $request){
        $user = UserInfo::find($request['id']);
        $user->delete();
        if($request->ajax()){
            return 0;
        }
    }
}
