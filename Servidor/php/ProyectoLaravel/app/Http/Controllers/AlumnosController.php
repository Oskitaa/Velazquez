<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alumno;
use App\Curso;

class AlumnosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $alumnos = Alumno::all();
        return view('alumnos.index',compact('alumnos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){   
        $cursos = Curso::all();
        return view('alumnos.create',compact("cursos"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){        
        $validaciones = ['nombre' => 'required|max:100','apellidos' => 'required','curso' => 'exists:cursos,id'];
        $mensajes = [
            'nombre.required' => 'El campo :attribute no puede estar vacío.',
            'nombre.max' => 'El campo :attribute no puede tener mas de 100 caracteres.',
            'apellidos.required' => 'El campo :attribute no puede estar vacío.',
            'curso.exists' => 'El campo :attribute no puede estar vacío.']; 
 
        $this->validate($request, $validaciones, $mensajes);
        
        $alumno = new Alumno;
        $alumno->nombre = $request->nombre;
        $alumno->apellidos = $request->apellidos;
        $alumno->edad = $request->edad;
        $alumno->curso = $request->curso;
        $alumno->save();
        
        return redirect('/alumnos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $alumno = Alumno::findOrFail($id);
        $curso = $alumno->Curso;
        return view("alumnos.show", compact('alumno','curso'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $alumno = Alumno::findOrFail($id);
        return view("alumnos.edit", compact('alumno'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validaciones = ['nombre' => 'required|max:100','apellidos' => 'required'];
        $mensajes = ['nombre.required' => 'El campo :attribute no puede estar vacío.','nombre.max' => 'Tiene campo :attribute tiene un max de 100 caracteres.','apellidos.required' => 'El campo :attribute no puede estar vacío.']; 
 
        $this->validate($request, $validaciones, $mensajes);
        
        $alumno = Alumno::findOrFail($id);
        $alumno->nombre = $request->nombre;
        $alumno->apellidos = $request->apellidos;
        $alumno->save();
        
        return redirect('/alumnos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alumno = Alumno::findOrFail($id);
        $alumno->delete();

        return redirect('/alumnos');
    }
}
