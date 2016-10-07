<?php

namespace App\Http\Repositories;


use App\Entities\Color;
use App\Entities\Product;

class ColorRepo extends BaseRepo
{

    public function getModel()
    {
        return new Color;
    }

    public function listAll()
    {
        return $this->model
            ->orderBy('color')
            ->lists('color', 'id');
    }

}