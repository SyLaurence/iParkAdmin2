<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use BaoPham\DynamoDb\DynamoDbModel;

class ParkInfo extends DynamoDbModel
{
    protected $table = 'ipark-mobilehub-2061022867-park_info';
}
