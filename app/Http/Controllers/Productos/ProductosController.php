<?php

namespace App\Http\Controllers\Productos;

use App\Http\Repositories\ProveedorRepo;
use App\Http\Repositories\ProductRepo;
use App\Http\Repositories\Productos_proveedoresRepo;
use App\Http\Repositories\UserRepo;
use App\Http\Repositories\ColorRepo;
use Illuminate\Http\Request;
use App\Http\Requests\ProductoRequest;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;

class ProductosController extends Controller
{
    protected $productRepo;
    protected $userRepo;
    protected $colorRepo;
    protected $proveedorRepo;
    protected $productos_proveedoresRepo;

    public function __construct(ProductRepo $productRepo, UserRepo $userRepo, ColorRepo $colorRepo, ProveedorRepo $proveedorRepo, Productos_proveedoresRepo $productos_proveedoresRepo)
    {
        $this->productRepo = $productRepo;
        $this->userRepo = $userRepo;
        $this->colorRepo = $colorRepo;
        $this->proveedorRepo = $proveedorRepo;
        $this->productos_proveedoresRepo = $productos_proveedoresRepo;
    }


    public function listar(Request $request)
    {
        $productos = $this->productRepo->listAndPaginate($request->get('search'), null);

        return view('productos.productos', compact('productos'));
    }


    public function misProductos(Route $route)
    {
        $usuario = Auth::user();
        $productos = $this->productRepo->listAndPaginate(null, $usuario->id);
        return view('productos.productos', compact('productos'));
    }


    public function buscar(Request $request)
    {
        $productos = $this->productRepo->listAndPaginate( $request->get('search'), null, null, $request->get('filtro'));

        return view('productos.productos', compact('productos'));
    }


    public function index()
    {
        $proveedores = $this->proveedorRepo->listAll()->toArray();
        $usuarios = $this->userRepo->listAll();
        $colores = $this->colorRepo->listAll()->toArray();

        return view('productos.formNuevo', compact('usuarios', 'colores', 'proveedores'));
    }


    public function create(Request $request)
    {
        $data = $request->all();

        $producto = $this->productRepo->massCreate($data);
        $producto->colores()->attach([$request->color]);
        $producto->proveedores()->attach([$request->proveedor_id]);

        return redirect()->route('productos.index')->with('msgOk', 'El producto ha sido agregado correctamente');
    }


    public function show(Route $route)
    {
        $producto = $this->productRepo->findOrFail($route->getParameter('id'));
        $producto->provActual = $producto->proveedores()->first()->id;
        $producto->colorActual = $producto->colores()->first()->id;

        $users = $this->userRepo->listAll()->toArray();
        $proveedores = $this->proveedorRepo->listAll()->toArray();
        $colores = $this->colorRepo->listAll()->toArray();

        return view('productos.formEditar', compact('producto', 'users', 'colores', 'proveedores'));
    }


    public function edit(ProductoRequest $request, Route $route)
    {
        $producto = $this->productRepo->findOrFail($route->getParameter('id'));
        $this->productRepo->massEdit($producto, $request->only('producto', 'precio', 'stock', 'users_id'));
        $producto->colores()->sync([$request->color]);
        $producto->proveedores()->sync([$request->proveedor_id]);

        return redirect()->route('productos.index')->with('msgOk','Registro editado correctamente');
    }


    public function destroy(Route $route)
    {
        $producto = $this->productRepo->findOrFail($route->getParameter('id'));
        $this->productRepo->delete($producto);

        return redirect()->back()->with('msgOk', 'El producto ha sido eliminado');
    }

}
