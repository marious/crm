<?php
namespace App\Models\Core\Auth\Traits\Relationship;

use App\Models\Core\Auth\User;

trait RoleRelationship
{
    public function users()
    {
        return $this->belongsToMany(User::class, 'role_user', 'role_id', 'user_id');
    }
}