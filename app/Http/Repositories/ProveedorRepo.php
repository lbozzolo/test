<?php
/**
 * Created by PhpStorm.
 * User: lbozzolo
 * Date: 01/09/2016
 * Time: 02:02 PM
 */

namespace App\Http\Repositories;


use App\Entities\Proveedor;

class ProveedorRepo extends BaseRepo
{

    public function getModel()
    {
        return new Proveedor;
    }


    public function listAndPaginate($search = null , $user = null, $paginate = 6, $filtro= null)
    {

        $proveedores = $this->model
            ->orderBy('id');

        // User
        if (!is_null($user) && $user > 0)
            $proveedores->where('users_id', $user);


        // Search
        if (!is_null($search) && $search != ''){

            $proveedores->where(function ($qry) use ($search, $filtro) {
                $qry->where($filtro, 'like', "%$search%")
                    ->orWhere('id', $search);
            });

        };

        return $proveedores->paginate($paginate);
    }


    public function listAll()
    {
        return $this->model
            ->orderBy('nombre')
            ->lists('nombre', 'id');
    }

}