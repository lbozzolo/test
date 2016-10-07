<?php


namespace App\Http\Repositories;


use App\Entities\Role;

class RoleRepo extends BaseRepo
{

    public function getModel()
    {
        return new Role;
    }

}