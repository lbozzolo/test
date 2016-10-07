<?php

namespace App\Http\Controllers\Usuarios;

use App\Http\Repositories\ProductRepo;
use App\Http\Repositories\UserRepo;
use App\Http\Repositories\ColorRepo;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\PasswordUpdateRequest;
use App\Http\Requests\UserEditRequest;
use Illuminate\Http\Request;
use App\Http\Requests\ProductoRequest;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    protected $productRepo;
    protected $userRepo;
    protected $colorRepo;

    public function __construct(ProductRepo $productRepo, UserRepo $userRepo, ColorRepo $colorRepo)
    {
        $this->productRepo = $productRepo;
        $this->userRepo = $userRepo;
        $this->colorRepo = $colorRepo;
    }

    public function listar(Request $request)
    {
        $usuarios = $this->userRepo->listAndPaginate(null, $request->get('search'));

        return view('usuarios.usuarios', compact('usuarios'));
    }

    public function verPerfil(Route $route)
    {
        $user = $this->userRepo->findOrFail($route->getParameter('id'));

        return view('usuarios.perfil', compact('user'));
    }


    public function buscar(Request $request)
    {
        $usuarios = $this->userRepo->listAndPaginate( $request->get('search'), null, null, $request->get('filtro'));

        return view('usuarios.usuarios', compact('usuarios'));
    }

    public function create(Request $request)
    {
        $data = $request->all();

        $this->productRepo->massCreate($data);
    }

    public function show(Route $route)
    {
        $user = $this->userRepo->findOrFail($route->getParameter('id'));
        $user->colorActual = $user->colores()->first()->id;
        $colores = $this->colorRepo->listAll()->toArray();

        $rolesActuales = $user->roles()->get();
        if ($rolesActuales->contains(1)){
            $user->rolCliente = true;
        }
        if ($rolesActuales->contains(2)){
            $user->rolEmpleado = true;
        }
        if ($rolesActuales->contains(3)){
            $user->rolAdmin = true;
        }

        return view('usuarios.formEditar', compact('user', 'colores'));
    }

    public function edit(UserEditRequest $request, Route $route)
    {
        $usuario = $this->userRepo->findOrFail($route->getParameter('id'));
        $this->userRepo->massEdit($usuario, $request->only('name', 'apellido', 'email', 'edad'));

        $usuario->colores()->sync([$request->color]);
        $usuario->roles()->sync($request->rol);

        return redirect()->route('usuarios.index')->with('msgOk','Registro editado correctamente');

    }

    public function destroy(Route $route)
    {
        $usuario = $this->userRepo->findOrFail($route->getParameter('id'));
        $this->userRepo->delete($usuario);

        return redirect()->back()->with('msgOk', 'El usuario ha sido eliminado');

    }

    public function password(Route $route)
    {
        $user = $this->userRepo->findOrFail($route->getParameter('id'));
        return View('usuarios.change-password', compact('user'));

    }

    public function updatePassword(PasswordUpdateRequest $request, Route $route){

        $usuario = $this->userRepo->findOrFail($route->getParameter('id'));

        if (Hash::check($request->mypassword, $usuario->password)) {

            $this->userRepo->passwordUpdate($usuario, $request);
            return redirect()->route('usuarios.index')->with('msgOk', 'La contraseña ha sido modificada');

        }else{

            return redirect()->back()->withErrors("La contraseña actual es incorrecta");

        }

    }

}
