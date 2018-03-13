<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserInfo extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function userlevel(){
    	return $this->hasMany('App\UserLevel'); 
    }

}
