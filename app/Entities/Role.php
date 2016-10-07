<?php namespace App\Entities;

class Role extends Entity
{
    protected $fillable = [];

    //Relaciones
    public function users()
    {
        return $this->belongsToMany(User::getClass(), 'users_roles', 'role_id', 'user_id');
    }

}
