<?php

namespace App\Services\Core\Auth;

use App\Hooks\User\AfterLogin;
use App\Hooks\User\BeforeLogin;
use App\Models\Core\Auth\Role;
use App\Models\Core\Auth\User;
use App\Services\Core\BaseService;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Hash;

class UserService extends BaseService
{
    protected $role;

    public function __construct(User $user, Role  $role)
    {
        $this->model = $user;
        $this->role = $role;
    }

    public function login()
    {
        $user = $this->model::findByEmail( request()->get('email') );
        BeforeLogin::new(true)
                ->setModel($user)
                ->handle();

        if (!$user->roles->count()) {
            throw new AuthenticationException(trans('default.no_roles_found'));
        }

        if (Hash::check(request()->get('password'), optional($user)->password)) {
            auth()->login($user, request()->get('remember_me', false));
            AfterLogin::new(true)
                ->setModel($user)
                ->handle();

            return $user;
        }



        throw new AuthenticationException(
            trans('default.incorrect_user_password', [
                'password' => trans('default.password'),
                'email' => trans('default.email')
            ])
        );
    }
}
