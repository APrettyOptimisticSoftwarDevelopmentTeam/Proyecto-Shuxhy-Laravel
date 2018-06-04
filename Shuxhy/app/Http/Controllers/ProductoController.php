<?php

namespace Shuxhy\Http\Controllers;

use Illuminate\Http\Request;

use Shuxhy\Http\Requests;
use Shuxhy\Producto;
use Illuminate\Support\Facades\Redirect;
use Shuxhy\Http\Requests\ProductoFormRequest;
use DB;

class ProductoController extends Controller
{
    public function __construct()
    {

    }
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $productos=DB::table('producto')->where('nombre','LIKE','%'.$query.'%')
            ->where ('condicion','=','1')
            ->orderBy('idProducto','desc')
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
        $producto->Cantidad=$request->get('Cantidad');
        $producto->Descripcion=$request->get('Descripcion');
        $producto->Precioporunidad=$request->get('Precioporunidad');
        $producto->Unidad_entero=$request->get('Unidad_entero');
        $producto->Unidad_medida=$request->get('Unidad_medida');
        $producto->Unidad_onzas=$request->get('Unidad_Onzas');
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
        $producto->Cantidad=$request->get('Cantidad');
        $producto->Descripcion=$request->get('Descripcion');
        $producto->Precioporunidad=$request->get('Precioporunidad');
        $producto->Unidad_entero=$request->get('Unidad_entero');
        $producto->Unidad_medida=$request->get('Unidad_medida');
        $producto->Unidad_Onzas=$request->get('Unidad_Onzas');
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
