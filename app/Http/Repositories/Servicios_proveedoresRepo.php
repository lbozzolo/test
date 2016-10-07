<?php


namespace App\Http\Repositories;


use App\Entities\Servicios_proveedores;

class Servicios_proveedoresRepo extends BaseRepo
{

    public function getModel()
    {
        return new Servicios_proveedores;
    }

    /*public function servicioSinContrataciones($idServicio)
    {
        $servicios = $this->model;
        $servicios = $servicios->where('contratacion', '0')
                            ->where('id_servicio', '=', $idServicio)
                            ->get();

        dd($servicios);

        return $servicios;
    }*/


}