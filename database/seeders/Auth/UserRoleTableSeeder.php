<?php

namespace Database\Seeders\Auth;

use App\Models\Core\Auth\User;
use Illuminate\Database\Seeder;
use Database\Seeders\Traits\DisableForeignKeys;

class UserRoleTableSeeder extends Seeder
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

        $user = User::query()->find(1);
        $user->assignRole(config('access.users.app_admin_role'));

        $this->enableForeignKeys();
    
    }
}
