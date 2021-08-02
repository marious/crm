<?php
namespace App\Http\Controllers\CRM\Frontend;

use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function settingPages()
    {
        return view('crm.settings.settings');
    }

    public function productCategoryList()
    {
        return view('crm.products.categories');
    }

    public function productBrandList()
    {
        return view('crm.products.brands');
    }

    public function productUnitList()
    {
        return view('crm.products.units');
    }

    public function productAttributeList()
    {
        return view('crm.products.attributes');
    }
}
