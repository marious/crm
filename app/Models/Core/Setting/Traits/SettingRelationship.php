<?php
namespace App\Models\Core\Setting\Traits;

trait SettingRelationship
{
    public function settingable()
    {
        return $tis->morphTo();
    }
}
