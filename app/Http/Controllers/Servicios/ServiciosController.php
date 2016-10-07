<?php

namespace App\Http\Controllers\Servicios;

use App\Entities\Servicio;
use App\Entities\Categoria;
use App\Entities\Contratacion;
use App\Http\Repositories\ContratacionRepo;
use App\Http\Repositories\categoriaRepo;
use App\Http\Repositories\ProductRepo;
use App\Http\Repositories\ServicioRepo;
use App\Http\Repositories\ProveedorRepo;
use App\Http\Repositories\Servicios_proveedoresRepo;
use App\Http\Repositories\UserRepo;
use Illuminate\Http\Request;
use App\Http\Requests\ProductoRequest;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;

class ServiciosController extends Controller
{
    protected $servicioRepo;
    protected $proveedorRepo;
    protected $contratacionRepo;
    protected $categoriaRepo;
    protected $servicios_proveedoresRepo;

    public function __construct(ServicioRepo $servicioRepo, ProveedorRepo $proveedorRepo, ContratacionRepo $contratacionRepo, Categoria $categoriaRepo, Servicios_proveedoresRepo $servicios_proveedoresRepo)
    {
        $this->servicioRepo = $servicioRepo;
        $this->proveedorRepo = $proveedorRepo;
        $this->contratacionRepo = $contratacionRepo;
        $this->categoriaRepo = $categoriaRepo;
        $this->servicios_proveedoresRepo = $servicios_proveedoresRepo;
    }


    public function listar(Request $request)
    {
        $contrataciones = $this->servicios_proveedoresRepo->all();
        $servicios = $this->servicioRepo->listAndPaginate($request->get('search'), null);
        $proveedores = $this->proveedorRepo->all();
        $categorias = $this->categoriaRepo->all();
        
        return view('servicios.servicios', compact('servicios', 'proveedores', 'contrataciones', 'categorias'));
    }



    public function buscar(Request $request)
    {
        $servicios = $this->servicioRepo->listAndPaginate( $request->get('search'), null, null, $request->get('filtro'));

        return view('servicios.servicios', compact('servicios'));
    }


    public function modificar(Request $request, Route $route)
    {

        $proveedor = $this->proveedorRepo->findOrFail($route->getParameter('id'));
        $servicio = $this->servicioRepo->findOrFail($route->getParameter('srv'));

        $contrataciones = $this->servicios_proveedoresRepo->all();
        $contratacion = $contrataciones->where('id_proveedor', $proveedor->id)
                                       ->where('id_servicio', $servicio->id)
                                       ->first();

        if ($contratacion->contratacion == 1){//Desactiva servicio
           $contratacion->contratacion = '0';
           $cont = 'desactivado';
        }elseif($contratacion->contratacion == 0){//Activa servicio
            $contratacion->contratacion = '1';
            $cont = 'activado';
        }

        $contratacion->save();
        return redirect()->route('servicios.index')
                         ->with('msgOk','Servicio '.$cont.' con éxito');

    }

}
