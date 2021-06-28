<?php

namespace App\Models\Core\Auth;

use Altek\Eventually\Eventually;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class BaseModel extends Authenticatable
{

}
