<?php

namespace App\Http\Controllers\Auth;

use App\Http\Repositories\UserRepo;
use App\Http\Repositories\RoleRepo;
use App\Http\Requests\Request;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserLoginRequest;
use App\User;
use App\Role;
use App\Http\Repositories\ColorRepo;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    protected $userRepo;
    protected $colorRepo;

    public function __construct(UserRepo $userRepo, RoleRepo $roleRepo, ColorRepo $colorRepo)
    {
        $this->userRepo = $userRepo;
        $this->roleRepo = $roleRepo;
        $this->colorRepo = $colorRepo;
    }

    public function index()
    {
        return view('auth.login');
    }

    public function getRegisterUser()
    {
        $colores = $this->colorRepo->listAll()->toArray();
        return view('auth.register', compact('colores'));
    }

    public function registerUser(UserCreateRequest $request)
    {

        $user = $this->userRepo->massCreate([
            'name' => $request['name'],
            'apellido' => $request['apellido'],
            'email' => $request['email'],
            'edad' => $request['edad'],
            'password' => bcrypt($request['password']),
        ]);

        $user->roles()->attach($request->rol);
        $user->colores()->attach([$request->color]);

        Auth::login($user);

        return redirect()->route('productos.index');
    }

    public function loginUser(UserLoginRequest $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password]))
             return redirect()->route('productos.index');
            //return redirect()->intended('');
        else
            return redirect()->back()->withErrors("Error de logueo");
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('auth.login');
    }

}
