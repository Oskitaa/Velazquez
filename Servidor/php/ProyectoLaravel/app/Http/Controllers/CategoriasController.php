<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $categorias = Categoria::with('Curso')->get();
        return view('categorias.index',compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){        
        $validaciones = ['nombre' => 'required|max:100|unique:categorias'];
        $mensajes = ['nombre.required' => 'El campo :attribute no puede estar vacío.','nombre.max' => 'Tiene campo :attribute tiene un max de 100 caracteres.', 'nombre.unique' => 'El campo:attribute tiene que ser unico.']; 
 
        $this->validate($request, $validaciones, $mensajes);
        
        $categoria = new Categoria;
        $categoria->nombre = $request->nombre;
        $categoria->descripcion = $request->descripcion;
        $categoria->save();
        
        return redirect('/categorias');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categoria = Categoria::findOrFail($id);
        return view("categorias.show", compact('categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria = Categoria::findOrFail($id);
        return view("categorias.edit", compact('categoria'));
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
        $validaciones = ['nombre' => 'required|max:100|unique:categorias'];
        $mensajes = ['nombre.required' => 'El campo :attribute no puede estar vacío.','nombre.max' => 'Tiene campo :attribute tiene un max de 100 caracteres.', 'nombre.unique' => 'El campo:attribute tiene que ser unico.']; 
 
        $this->validate($request, $validaciones, $mensajes);
        
        $categoria = Categoria::findOrFail($id);
        $categoria->nombre = $request->nombre;
        $categoria->descripcion = $request->descripcion;
        $categoria->save();
        
        return redirect('/categorias');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();
        return redirect('/categorias');
    }
}
