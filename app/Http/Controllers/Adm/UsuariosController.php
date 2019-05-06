<?php

namespace App\Http\Controllers\Adm;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsuariosController extends Controller
{
    public function page()
    {
        return view('adm.usuarios.index');
    }

    public function index(Request $request)
    {
        $usuarios = User::orderBy('id', 'DESC')->get();

        return [
            'usuarios' => $usuarios 
        ];
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'direccion' => 'required',
            'activo' => 'required',
            'nivel' => 'required'
        ]);
        
        User::create($request->all());
        return;
    }

    public function edit(User $user)
    {
        return $user;
    }

    public function update(Request $request, $id)
    {
        /* $this->validate($request, [
            'email' => 'required|email',
            'direccion' => 'required',
            'activo' => 'required',
            'nivel' => 'required'
        ]); */
        $user = User::find($id)->update($request->all());
        return;
    }

    public function destroy(User $usuario)
    {
        $usuario->delete();
    }
}
