<?php
namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Services\Core\Setting\SettingService;

class SettingController extends Controller
{
    public function __construct(SettingService $setting)
    {
        $this->service = $setting;
    }

    /**
     * Display a listing of the resource
     *
     * @return mixed
     */
    public function index()
    {
        return $this->service->getFormattedSettings();
    }

    public function store()
    {

    }

    public function update()
    {

    }

    public function destroy()
    {

    }
}
