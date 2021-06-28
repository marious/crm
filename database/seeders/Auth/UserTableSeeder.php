<?php
namespace Database\Seeders\Auth;

use App\Models\Core\Auth\User;
use Illuminate\Database\Seeder;
use Database\Seeders\Traits\DisableForeignKeys;

class UserTableSeeder extends Seeder
{
   use DisableForeignKeys;

   public function run()
   {
       $this->disableForeignKeys();

        User::query()->create([
            'first_name' => 'admin',
            'last_name' => 'admin',
            'email' => 'info@th.com',
            'password' => bcrypt('123456'),
            'status_id' => 1
        ]);


       $this->enableForeignKeys();
   }
}