<?php namespace App\Entities;

use Illuminate\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Entity implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    //protected $table = 'users';

    protected $fillable = ['name', 'apellido', 'email', 'edad', 'password','tipo'];

    protected $hidden = ['password', 'remember_token'];

    public function hasRole($role)
    {
        $userID = Auth::user();
        $rolesUser = $userID->roles()->get();
        foreach ($rolesUser as $rol) {
            if($rol->name == $role){
                return true;
            }
        }
        //return User::where('role', $role)->get();
    }
    //Relaciones
    public function productos()
    {
        return $this->hasMany(Producto::getClass(), 'users_id');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::getClass(), 'users_roles');
    }

    public function colores()
    {
        return $this->morphToMany(Color::getClass(), 'colorables');
    }

}
