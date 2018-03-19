<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use BaoPham\DynamoDb\DynamoDbModel;

class rate_info extends DynamoDbModel
{
    //use SoftDeletes;
    //protected $dates = ['deleted_at'];
}
