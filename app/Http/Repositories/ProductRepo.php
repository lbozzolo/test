<?php
/**
 * Created by PhpStorm.
 * User: lbozzolo
 * Date: 01/09/2016
 * Time: 02:02 PM
 */

namespace App\Http\Repositories;


use App\Entities\Product;
use App\Entities\Color;

class ProductRepo extends BaseRepo
{
    public function getModel()
    {
        return new Product;
    }


    public function productsAll()
    {
        return $this->model->all();
    }

    public function listAndPaginate($search = null , $user = null, $paginate = 6, $filtro= null)
    {

        $productos = $this->model
            ->orderBy('id');

        // User
        if (!is_null($user) && $user > 0)
            $productos->where('users_id', $user);


        // Search
        if (!is_null($search) && $search != ''){

            $productos->where(function ($qry) use ($search, $filtro) {
                $qry->where($filtro, 'like', "%$search%")
                    ->orWhere('id', $search);
            });

        };

        return $productos->paginate($paginate);
    }

    public function delete($model)
    {
        $model->delete();

        return true;
    }
}