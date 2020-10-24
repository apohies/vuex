<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;

class UsuariosController extends Controller
{
    public function index()
    {
        $usuarios=Usuario::all();

        return  $usuarios;
    }

    public function create(Request $request){

        $usuario= new Usuario();
        $usuario->nombre=$request->nombre;
        $usuario->imagen=$request->imagen;
        $usuario->cedula=$request->cedula;
        $usuario->correo=$request->correo;
        $usuario->telefono=$request->telefono;
        $usuario->observaciones=$request->telefono;;
        $usuario->save();


        return response()->json('exito');
    }

    public function show($id){

        $usuario=Usuario::where('id',$id)->first();

        return $usuario;
    }


    public function edit($id,Request $request){

        $usuario=Usuario::where('id',$id)->first();
        $usuario->nombre=$request->nombre;
        $usuario->imagen=$request->imagen;
        $usuario->cedula=$request->cedula;
        $usuario->correo=$request->correo;
        $usuario->telefono=$request->telefono;
        $usuario->observaciones=$request->observaciones;
        $usuario->update();


        return response()->json('exito');
    }

    public function delete($id)
    {
        $usuario=Usuario::where('id',$id)->first();
        $usuario->delete();

        return response()->json('usuario eliminado');
    }
}
