<?php

namespace Shuxhy\Http\Controllers;

use Illuminate\Http\Request;

use Shuxhy\Http\Requests;
use Shuxhy\Producto;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input; // Para poder subir archivos e imagenes
use Shuxhy\Http\Requests\ProductoFormRequest;
use DB;

class ProductoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $productos=DB::table('producto')->where('nombre','LIKE','%'.$query.'%')
            ->where ('Condicion','=','1')
            ->orderBy('IdProducto','desc')
            ->paginate(7);
            return view('almacen.producto.index',["productos"=>$productos,"searchText"=>$query]);
        }
    }
    public function create()
    {
        return view("almacen.producto.create");
    }
    public function store (ProductoFormRequest $request)  // Funcion para crear 
    {
        $producto=new Producto;
        $producto->Nombre=$request->get('Nombre');
        $producto->Descripcion=$request->get('Descripcion');
        $producto->Precio=$request->get('Precio');
        $producto->Unidad=$request->get('Unidad');
        $producto->CostoProduccion=$request->get('CostoProduccion');
        $producto->Peso=$request->get('Peso');
        $producto->Forma=$request->get('Forma');
        $producto->Relleno=$request->get('Relleno');
        $producto->Sabor=$request->get('Sabor');
        $producto->Topping=$request->get('Topping');

        if (Input::hasFile('Imagen')) 
        {
            $file=Input::file('Imagen');
            $file->move(public_path(). 'imagenes/productos/', $file->getClientOriginalName());
            $producto->Imagen=$file->getClientOriginalName();
        }


        $producto->condicion='1';
        $producto->save();
        return Redirect::to('almacen/producto');

    }
    public function show($id)
    {
        return view("almacen.producto.show",["producto"=>Producto::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("almacen.producto.edit",["producto"=>Producto::findOrFail($id)]);
    }
    public function update(ProductoFormRequest $request,$id)  // funcion para editar
    {
        $producto=Producto::findOrFail($id);
        $producto->Nombre=$request->get('Nombre');
        $producto->Descripcion=$request->get('Descripcion');
        $producto->Precio=$request->get('Precio');
        $producto->Unidad=$request->get('Unidad');
        $producto->CostoProduccion=$request->get('CostoProduccion');
        $producto->Peso=$request->get('Peso');
        $producto->Forma=$request->get('Forma');
        $producto->Relleno=$request->get('Relleno');
        $producto->Sabor=$request->get('Sabor');
        $producto->Topping=$request->get('Topping');

        if (Input::hasFile('Imagen')) 
        {
            $file=Input::file('Imagen');
            $file->move(public_path(). 'imagenes/productos/', $file->getClientOriginalName());
            $producto->Imagen=$file->getClientOriginalName();
        }
        
        $producto->update();
        return Redirect::to('almacen/producto');
    }
    public function destroy($id)  // funcion para borrar
    {
        $producto=Producto::findOrFail($id);
        $producto->condicion='0';
        $producto->update();
        return Redirect::to('almacen/producto');
    }
}
