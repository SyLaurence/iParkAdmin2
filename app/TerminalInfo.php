<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use BaoPham\DynamoDb\DynamoDbModel;

class TerminalInfo extends DynamoDbModel
{
    //use SoftDeletes;
    //protected $dates = ['deleted_at'];
    protected $table = 'ipark-mobilehub-2061022867-terminal_info';
}
