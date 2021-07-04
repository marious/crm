<?php
namespace App\Http\Controllers\CRM\Frontend;

use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function settingPages()
    {
        return view('crm.settings.settings');
    }
}
