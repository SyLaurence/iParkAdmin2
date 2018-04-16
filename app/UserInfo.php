<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use BaoPham\DynamoDb\DynamoDbModel;

class UserInfo extends Model
{

	//protected $table = 'ipark-mobilehub-2061022867-admin_info';
    use SoftDeletes;
    protected $dates = ['deleted_at'];

}
