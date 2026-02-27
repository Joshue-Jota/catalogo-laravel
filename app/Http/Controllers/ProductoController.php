<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;
Use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $datos['productos'] = Producto::paginate(5);
        return view('Producto.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categorias = Categoria::all(); //esto nos sirve para obtener todas las categorias de la base de datos, y las guardamos en la variable categorias
        return view('Producto.create', compact('categorias')); //esto nos sirve para mostrar la vista de crear producto, y le pasamos las categorias que tenemos en la base de datos, para que el usuario pueda seleccionar una categoria al crear un producto
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $datosProducto = request()->except('_token'); //esto nos sirve para eliminar el token que se genera automaticamente en el formulario, ya que no lo necesitamos para guardar los datos en la base de datos
        if($request->hasFile('imagen')){ //esto nos sirve para verificar si el usuario ha seleccionado una foto para el producto, y si es asi, guardamos la foto en la carpeta public/storage/productos, y guardamos el nombre de la foto en la variable $datosProducto['Foto']
            $datosProducto['imagen'] = $request->file('imagen')->store('uploads', 'public');
        }
        Producto::insert($datosProducto);
        
        return redirect('producto')->with('mensaje', 'Producto agregado con éxito'); //esto nos sirve para redireccionar a la vista de producto despues de guardar los datos en la base de datos

        

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
    public function edit( $id)
    {
        //
         $producto=Producto::findOrFail($id); //esto nos sirve para buscar el producto por su id, y si no lo encuentra, nos muestra un error 404
        $categorias = Categoria::all(); //esto nos sirve para obtener todas las categorias de la base de datos, y las guardamos en la variable categorias
        return view('Producto.edit', compact('producto', 'categorias')); //esto nos sirve para mostrar la vista de editar producto, y le pasamos el producto que queremos editar, y las categorias que tenemos en la base de datos, para que el usuario pueda seleccionar una categoria al editar un producto
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        //
        $datosProducto = request()->except(['_token','_method']);
        if($request->hasFile('imagen')){
            $producto = Producto::findOrFail($id);
            Storage::disk('public')->delete($producto->imagen);
            $datosProducto['imagen'] = $request->file('imagen')->store('uploads', 'public');
        }
        Producto::where('id','=',$id)->update($datosProducto); //esto nos sirve para actualizar los datos del producto, y le pasamos el id del producto que queremos actualizar

        $producto=Producto::findOrFail($id); //esto nos sirve para buscar el producto por su id, y si no lo encuentra, nos muestra un error 404
        return redirect()->route('producto.index')->with('mensaje', 'Producto actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    $producto = Producto::findOrFail($id);

    if ($producto->imagen && Storage::disk('public')->exists($producto->imagen)) {
        Storage::disk('public')->delete($producto->imagen);
    }

    $producto->delete();

    return redirect('producto')->with('mensaje', 'Producto eliminado con éxito');
}
}
