<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curso;
use App\Categoria;

class CursosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $cursos = Curso::with('Alumno')->get();
        return view('cursos.index',compact('cursos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){   
        $categorias = Categoria::all();
        return view('cursos.create',compact("categorias"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){        
        $validaciones = ['nombre' => 'required|max:100','horas' => 'required','plazas' => 'required','categoria' => 'exists:categorias,id'];
        $mensajes = ['nombre.required' => 'El campo :attribute no puede estar vacío.','horas.required' => 'El campo :attribute no puede estar vacío.','plazas.required' => 'El campo :attribute no puede estar vacío.','categoria.exists' => 'El campo :attribute no puede estar vacío.']; 
 
        $this->validate($request, $validaciones, $mensajes);
        
        $curso = new Curso;
        $curso->nombre = $request->nombre;
        $curso->horas = $request->horas;
        $curso->plazas = $request->plazas;
        $curso->categoria = $request->categoria;
        $curso->save();
        
        return redirect('/cursos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $curso = Curso::with('Alumno')->where('id',$id)->get();
        return view("cursos.show", compact('curso'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $curso = Curso::findOrFail($id);
        $categorias = Categoria::all();
        return view("cursos.edit", compact('curso','categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $curso = Curso::findOrFail($id);
        $alum = $curso->Alumno;

        $validaciones = ['nombre' => 'required|max:100','horas' => 'required','plazas' => "required|numeric|min:".count($alum),'categoria' => 'exists:categorias,id'];
        $mensajes = ['nombre.required' => 'El campo :attribute no puede estar vacío.','horas.required' => 'El campo :attribute no puede estar vacío.','plazas.required' => 'El campo :attribute no puede estar vacío.','categoria.exists' => 'El campo :attribute no puede estar vacío.','plazas.min' => 'El numero de plazas tiene que ser mayor.']; 
 
        $this->validate($request, $validaciones, $mensajes);
        
        
        $curso->nombre = $request->nombre;
        $curso->horas = $request->horas;
        $curso->plazas = $request->plazas;
        $curso->categoria = $request->categoria;
        $curso->save();
        
        return redirect('/cursos');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $curso = Curso::findOrFail($id);
        $curso->delete();
        return redirect('/cursos');
    }
}
