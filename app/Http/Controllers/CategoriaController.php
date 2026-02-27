<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $datos['categorias'] = Categoria::paginate(55); //esto nos sirve para paginar los datos, es decir, mostrar 5 categorias por pagina
        return view('Categoria.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('Categoria.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        //$datosCategoria = request()->all();
        $datosCategoria = request()->except('_token'); //esto nos sirve para eliminar el token que se genera automaticamente en el formulario, ya que no lo necesitamos para guardar los datos en la base de datos
        Categoria::insert($datosCategoria);
        return redirect('categoria')->with('mensaje', 'Categoria agregada con éxito'); //esto nos sirve para redireccionar a la vista de categoria despues de guardar los datos en la base de datos
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        //
        $categoria=Categoria::findOrFail($id); //esto nos sirve para buscar la categoria por su id, y si no la encuentra, nos muestra un error 404
        
        return view('Categoria.edit', compact('categoria')); //esto nos sirve para mostrar la vista de editar categoria, y le pasamos la categoria que queremos editar
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $datosCategoria = request()->except(['_token','_method']);
        Categoria::where('id','=',$id)->update($datosCategoria); //esto nos sirve para actualizar los datos de la categoria, y le pasamos el id de la categoria que queremos actualizar

        $categoria=Categoria::findOrFail($id); //esto nos sirve para buscar la categoria por su id, y si no la encuentra, nos muestra un error 404
        return redirect()->route('categoria.index')->with('mensaje', 'Categoria actualizada con éxito');;

    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Categoria::destroy($id); 
        return redirect('categoria')->with('mensaje', 'Categoria eliminada con éxito');
    }
}
