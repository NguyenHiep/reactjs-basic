<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    const STATUS_ON  = 1;
    const STATUS_OFF = 2;
}