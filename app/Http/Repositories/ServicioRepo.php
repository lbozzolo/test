<?php

namespace App\Http\Repositories;


use App\Entities\Servicio;

class ServicioRepo extends BaseRepo
{

    public function getModel()
    {
        return new Servicio;
    }

    public function listAndPaginate($search = null , $user = null, $paginate = 6, $filtro= null)
    {

        $servicios = $this->model
            ->orderBy('id');

        // User
        if (!is_null($user) && $user > 0)
            $servicios->where('users_id', $user);


        // Search
        if (!is_null($search) && $search != ''){

            $servicios->where(function ($qry) use ($search, $filtro) {
                $qry->where($filtro, 'like', "%$search%")
                    ->orWhere('id', $search);
            });

        };

        return $servicios->paginate($paginate);
    }


}