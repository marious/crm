<?php

namespace App\Models\Core\Auth;

use App\Models\Core\Auth\Traits\Relationship\RoleRelationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory,
        RoleRelationship;
}
