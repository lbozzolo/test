<?php

namespace App\Http\Controllers\Contrataciones;

use App\Entities\Servicio;
use App\Entities\Categoria;
use App\Entities\Contratacion;
use App\Entities\Proveedor;

use App\Http\Repositories\ProductRepo;
use App\Http\Repositories\ServicioRepo;
use App\Http\Repositories\ProveedorRepo;
use App\Http\Repositories\ContratacionRepo;

use Illuminate\Http\Request;
use App\Http\Requests\ProductoRequest;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;

class ContratacionesController extends Controller
{
    protected $contratacionRepo;
    protected $servicioRepo;
    protected $productRepo;

    public function __construct(ContratacionRepo $contratacionRepo,
                                ServicioRepo $servicioRepo,
                                ProductRepo $productRepo,
                                ProveedorRepo $proveedorRepo)
    {
        $this->contratacionRepo = $contratacionRepo;
        $this->servicioRepo = $servicioRepo;
        $this->productRepo = $productRepo;
        $this->proveedorRepo = $proveedorRepo;
    }


    public function listar(Request $request)
    {
        $proveedores = $this->proveedorRepo->all();
        $productos = $this->productRepo->all();
        $servicios = $this->servicioRepo->all();

        return view('contrataciones.contrataciones', compact('proveedores', 'servicios', 'productos'));
    }


    public function buscar(Request $request)
    {
        $contrataciones = $this->contratacionRepo->listAndPaginate( $request->get('search'), null, null, $request->get('filtro'));

        return view('contrataciones.contrataciones', compact('contrataciones'));
    }

}
