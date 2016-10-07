<?php


namespace App\Http\Repositories;


use App\Entities\Contratacion;
use Illuminate\Support\Facades\DB;

class ContratacionRepo extends BaseRepo
{

    public function getModel()
    {
        return new Contratacion;
    }


    public function listAndPaginate($search = null , $user = null, $paginate = 6, $filtro= null)
    {

        $contrataciones = $this->model
            ->orderBy('id');

        // User
        if (!is_null($user) && $user > 0)
            $contrataciones->where('users_id', $user);


        // Search
        if (!is_null($search) && $search != ''){

            $contrataciones->where(function ($qry) use ($search, $filtro) {
                $qry->where($filtro, 'like', "%$search%")
                    ->orWhere('id', $search);
            });

        };

        return $contrataciones->paginate($paginate);
    }

}