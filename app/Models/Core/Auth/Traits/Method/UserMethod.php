<?php
namespace App\Models\Core\Auth\Traits\Method;

use App\Models\Core\Auth\Role;
use Illuminate\Database\Eloquent\Builder;

trait UserMethod
{
    public function canChangeEmail()
    {
        return config('access.users.change_email');
    }

    public function canChangePassword()
    {
        return !app('session')->has(config('access.socialite_session_name'));
    }

    public function hasProvider($provider)
    {
        foreach ($this->providers as $p) {
            if ($p->provider == $provider) {
                return true;
            }
        }

        return false;
    }

    public function assignRole($role)
    {
        if ($this->hasRole($role)) {
            return true;
        }

        if (is_string($role)) {
            return $this->roles()->attach(
                Role::findByName($role)->id,
            );
        }

        return $this->roles()->attach($role instanceof Role ? $role->id : $role);
    }

    public function isAdmin()
    {
        return $this->hasRole(config('access.users.app_admin_role'));
    }


    public function isBrandAdmin($brand_id = null)
    {
        return $this->admin('brand', $brand_id);
    }


    public function isAppAdmin()
    {
        return $this->admin();
    }


    /**
     * The result will be cached. it will be deleted if any updated happens 
     * in user model.
     */
    public function admin($type = 'app', $brand_id = null)
    {
        return cache()->remember($type . '-admin-'. $this->id, 84000, function () use ($type, $brand_id) {
            return $this->roles()
                        ->where('is_admin', 1)
                        ->where('is_default', 1)
                        ->when($brand_id, function (Builder $query) use ($brand_id) {
                            $query->where('brand_id', $brand_id);
                        }) 
                        ->whereHas('type', function (Builder $query) use ($type) {
                            $query->where('alias', $type);
                        })
                        ->exists();
        });
    }

    public static function findByEmail(string $email)
    {
        return self::where('email', $email)
                ->whereHas('status', function (Builder $builder) {
                    $builder->whereNotIn('name', ['status_inactive', 'status_invited']);
                })
                ->firstOrFail();
    }

    public function invite()
    {
        // return Mail::to($this->email)
        //         ->locale(app()->getLocale())
        //         ->send();
    }
}