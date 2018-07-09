<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    const STATUS_ON  = 1;
    const STATUS_OFF = 2;
}