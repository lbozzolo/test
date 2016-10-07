<?php

namespace App\Http\Controllers\Proveedores;

use App\Entities\Servicio;
use App\Entities\Categoria;
use App\Http\Repositories\ProductRepo;
use App\Http\Repositories\ProveedorRepo;
use App\Http\Repositories\ServicioRepo;
use App\Http\Repositories\UserRepo;
use Illuminate\Http\Request;
use App\Http\Requests\ProductoRequest;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;

class ProveedoresController extends Controller
{
    protected $proveedorRepo;

    public function __construct(ProveedorRepo $proveedorRepo)
    {
        $this->proveedorRepo = $proveedorRepo;
    }


    public function listar(Request $request)
    {

        //dd($request);
        $proveedores = $this->proveedorRepo->listAndPaginate($request->get('search'), null);

        return view('proveedores.proveedores', compact('proveedores'));
    }



    public function buscar(Request $request)
    {
        $servicios = $this->servicioRepo->listAndPaginate( $request->get('search'), null, null, $request->get('filtro'));

        return view('servicios.servicios', compact('servicios'));
    }


}