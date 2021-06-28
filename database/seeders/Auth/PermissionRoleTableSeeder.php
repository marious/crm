<?php

namespace Database\Seeders\Auth;

use App\Models\Core\Auth\Role;
use App\Models\Core\Auth\User;
use Illuminate\Database\Seeder;
use Database\Seeders\Traits\DisableForeignKeys;

class PermissionRoleTableSeeder extends Seeder
{
    use DisableForeignKeys;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();
        Role::query()->truncate();
        // Create roles
        $superAdmin = User::first();
        
        $roles = [
            [
                'name' => config('access.users.app_admin_role'),
                'is_admin' => 1,
                'created_by' => $superAdmin->id,
                'is_default' => 1
            ]
        ];

        Role::query()->insert($roles);

        $this->enableForeignKeys();
        
    }
}
