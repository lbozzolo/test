<?php

namespace App\Http\Repositories;


use App\Entities\User;
use App\Entities\Role;
use Illuminate\Support\Facades\DB;

class UserRepo extends BaseRepo
{
    public function getModel()
    {
        return new User;
    }

    public function listAll()
    {
        return $this->model->select(DB::raw('CONCAT(name, " ", apellido) AS full_name'), 'id')
             ->orderBy('full_name')
             ->lists('full_name', 'id');

    }


    public function usersAll()
    {
        return $this->model->all();
    }


    public function listSelect()
    {
        return $this->model->lists('name', 'id');
    }


    public function listAndPaginate($search = null , $user = null, $paginate = 6, $filtro= null)
    {
        $usuarios = $this->model->orderBy('id');

        // User
        if (!is_null($user) && $user > 0)
            $usuarios->where('users_id', $user);

        // Search
            if ($filtro == 'rol' && !is_null($search) && $search != '') {

                switch ($search) {
                    case 'cliente':
                        $search = '1';
                        break;
                    case 'empleado':
                        $search = '2';
                        break;
                    case 'admin':
                        $search = '3';
                        break;
                }

                $usuarios->join('users_roles', function ($join) use ($search) {
                    $join->on('users.id', '=', 'users_roles.user_id')
                        ->where('users_roles.role_id', '=', $search);
                })->get();

            } else {

                if (!is_null($search) && $search != '')

                $usuarios->where(function ($qry) use ($search) {
                    $qry->where('name', 'like', "%$search%")
                        ->orWhere('apellido', 'like', "%$search%")
                        ->orWhere('id', $search);
                });

                }

                return $usuarios->paginate($paginate);

    }


    public function delete($model)
    {
        $model->delete();
        return true;
    }


    public function passwordUpdate($model, $datos)
    {

        $password = bcrypt($datos->password);
        $model->fill(['password'=>$password]);
        $model->save();

        return $model;
    }


}