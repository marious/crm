<?php
namespace App\Models\Core\Auth\Traits\Relationship;

use App\Models\Core\Auth\Role;

trait UserRelationship
{
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id');
    }
}