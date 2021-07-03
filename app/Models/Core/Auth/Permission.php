<?php


namespace App\Models\Core\Auth;


use App\Models\Core\BaseModel;
use App\Models\Core\Traits\Translate\TranslatedNameTrait;
use App\Models\Core\Traits\TypeRelationship;

class Permission extends BaseModel
{
    use TranslatedNameTrait,
        TypeRelationship;

    protected $appends = ['translated_name'];

    protected $fillable = [
        'type_id', 'name', 'group_name'
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_permission', 'permission_id', 'role_id');
    }
}
