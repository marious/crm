<?php
namespace Database\Seeders\App;

use Illuminate\Database\Seeder;
use App\Models\Core\Setting\Setting;

class SettingTableSeeder extends Seeder 
{
    public function run()
    {
        Setting::query()->where('context', 'app')->delete();
        Setting::query()->insert(
            config('settings.app')
        );
    }
}