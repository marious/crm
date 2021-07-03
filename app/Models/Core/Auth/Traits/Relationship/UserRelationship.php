<?php
namespace App\Models\Core\Auth\Traits\Relationship;

use App\Models\Core\Auth\Role;
use App\Models\Core\File\File;
use App\Models\Core\Traits\CreatedByRelationship;
use App\Models\Core\Traits\StatusRelationship;

trait UserRelationship
{
    use CreatedByRelationship, StatusRelationship;

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id');
    }

    public function profilePicture()
    {
        return $this->morphOne(File::class, 'fileable')
                ->whereType('profile_picture');
    }
}
