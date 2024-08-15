<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\usuarios;
class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $usuarios = \App\Usuario::all();
        return view('usuarios.index', compact('usuarios'));
     }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('usuarios.create');
     }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $usuario = new \App\Usuario;
        $usuario->nombre = $request->nombre;
        $usuario->cedula = $request->cedula;
        $usuario->telefono = $request->telefono;
        $usuario->correo = $request->correo;
        $usuario->save();
        return redirect()->route('usuarios.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
        $usuario = \App\Usuario::find($id);
        return view('usuarios.show', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $usuario = \App\Usuario::find($id);
        return view('usuarios.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $usuario = \App\Usuario::find($id);
        $usuario->nombre = $request->nombre;
        $usuario->cedula = $request->cedula;
        $usuario->telefono = $request->telefono;
        $usuario->correo = $request->correo;
        $usuario->save();
        return redirect()->route('usuarios.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $usuario = \App\Usuario::find($id);
        $usuario->delete();
        return redirect()->route('usuarios.index');
    }
}
