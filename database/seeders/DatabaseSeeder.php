<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\Auth\TypeSeeder;
use Illuminate\Database\Eloquent\Model;
use Database\Seeders\Status\StatusSeeder;
use Database\Seeders\Auth\UserTableSeeder;
use Database\Seeders\App\SettingTableSeeder;
use Database\Seeders\Auth\PermissionRoleTableSeeder;
use Database\Seeders\Auth\UserRoleTableSeeder;
use Database\Seeders\Traits\DisableForeignKeys;

class DatabaseSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->disableForeignKeys();

        $this->call(UserTableSeeder::class);
        $this->call(StatusSeeder::class);
        $this->call(SettingTableSeeder::class);
        $this->call(TypeSeeder::class);
        $this->call(PermissionRoleTableSeeder::class);
        $this->call(UserRoleTableSeeder::class);

        Model::reguard();
    }
}
