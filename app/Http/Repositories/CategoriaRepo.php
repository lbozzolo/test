<?php
namespace App\Http\Repositories;


use App\Entities\Categoria;

class CategoriaRepo extends BaseRepo
{

    public function getModel()
    {
        return new Categoria;
    }

}