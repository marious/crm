<?php

namespace App\Http\Controllers\Core\Auth\User;

use App\Http\Controllers\Controller;
use App\Services\Core\Auth\UserService;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    public function show()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {

        try {
            $this->service->login();
            $route = home_route();

            return route($route['route_name'], [
                'params' => $route['route_params']
            ]);
        } catch (Exception $ex) {
            return response()->json([
                'message' => $ex instanceof ModelNotFoundException ? trans('default.resource_not_found', ['resource' => trans('default.user')]) : $ex->getMessage()
            ], 403);
        }
    }

    public function logOut()
    {
        auth()->logout();
        return redirect()->route('users.login.index');
    }
}
