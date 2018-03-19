<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use BaoPham\DynamoDb\DynamoDbModel;

class user_info extends DynamoDbModel
{
	protected $table = 'ipark-mobilehub-2061022867-park_info';
    //use SoftDeletes;
    //protected $dates = ['deleted_at'];

    // public function userlevel(){
    // 	return $this->hasMany('App\UserLevel'); 
    // }

}
