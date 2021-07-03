<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('crm.home');
    }
}
