<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
   public function index()
    {
        $usuarios = Alumno::all();
        return view('users.create', compact('alumno'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre'  => 'required|string|max:255',
            'modulo' => "required|string",
            'calificacion' => 'required|min:0|max:10'
        ], [
            'nombre.required'     => 'El nombre es obligatorio',
            'nombre.string'       => 'El nombre debe ser texto',
            'nombre.max'          => 'El nombre no puede superar los 255 caracteres',

            'modulo.required'    => 'El modulo es obligatorio',

            'calificacion.min'      => 'La calificación debe estar entre el 0 y el 10',
            'calificacion.max'      => 'La calificación debe estar entre el 0 y el 10',        
            ]);


        alumno::create([
            'nombre'     => $request->nombre,
            'modulo'    => $request->modulo,
            'calificacion' => $request->calificacion,
        ]);

        return redirect()->route('user.alumno')->with('success', '"Calificación guardada');
    }
}

