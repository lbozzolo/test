<?php


namespace App\Http\Repositories;


use App\Entities\Productos_proveedores;

class Productos_proveedoresRepo extends BaseRepo
{

    public function getModel()
    {
        return new Productos_proveedores;
    }

}