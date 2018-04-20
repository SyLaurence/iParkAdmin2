<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserInfo;

class UserController extends Controller
{
    public function index()
    {
        
        //$users = UserInfo::where('is_active', '!=', '0')->where('admin_id','!=','1')->get();
        $users = UserInfo::where('id','!=',session()->get('id'))->get();
        //$users = UserInfo::all();
        return view('User.user',compact('users'));
    }

    public function add(Request $request){

        // $user_id = '';
        // $user = UserInfo::all();
        // if(empty($user)){
        //     $user = '1';
        // } else {
        //     $high = '';
        //     foreach($user as $use){
        //         if($use->admin_id > $high){
        //             $high = $use->admin_id;
        //         }
        //     }
        //     $user_id = (int)$high+1;
        // }

        $user = new UserInfo;
        //$user->admin_id = $user_id.'';
        $user->fname = $request->user['ufname'];
        $user->username = $request->user['uuname'];
        $user->lname = $request->user['ulname'];
        $user->password = $request->user['upass'];
        $user->privilege = $request->user['upriv'];
        $user->save();

        if($request->ajax()){
            return 0;
        }
    }

    public function toEdit(Request $request){
        // $priv = '';
        // $users = UserInfo::where('is_active','!=','0')->get();
        // foreach($users as $user){
        //     if($user->admin_id == $request->user['uid']){
        //         $priv = $user->privilege;
        //     }
        // }

        $user = UserInfo::find($request->user['uid']);
        //$user->admin_id = $request->user['uid'];
        $user->username = $request->user['uuname'];
        $user->fname = $request->user['ufname'];
        $user->lname = $request->user['ulname'];
        $user->password = $request->user['upass'];
        //$user->privilege = $priv;
        $user->save();


        if($request->ajax()){
            return 0;
        }
    }

    public function priv(Request $request){
        $priv = $request['priv'];
        // $users = UserInfo::where('is_active','!=','0')->get();
        // foreach($users as $user){
        //     if($user->admin_id == $request['id']){
        //         $username = $user->username;
        //         $password = $user->password;
        //         $lname = $user->lname;
        //         $fname = $user->fname;
        //     }
        // }

        // $user = new UserInfo;
        // $user->admin_id = $request['id'];
        // $user->username = $username;
        // $user->fname = $fname;
        // $user->lname = $lname;
        // $user->password = $password;
        $user = UserInfo::find($request['id']);
        $user->privilege = $priv;
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
