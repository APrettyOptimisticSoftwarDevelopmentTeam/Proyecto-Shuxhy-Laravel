<?php

namespace Shuxhy\Http\Controllers;

use Illuminate\Http\Request;

use Shuxhy\Http\Requests;
use Shuxhy\Articulo; // Aqui siempre debo especificar el modelo que se usara
use Illuminate\Support\Facades\Redirect; // tambien hacer referencia a esta clase es la que se encarga de la redireccion de datos 
use Shuxhy\Http\Requests\CategoriaFormRequest; // agregamos esto para poder validar datos
use DB; // con esto podemos trabajar con la clase db de laravel que nos permitira hacer operaciones de base de datos

class ArticuloController extends Controller
{
    //

	 public function __construct()
    {

    }

    public function index(Request $request)
    {
    	if ($request)
        {
            $query=trim($request->get('searchText'));
            $articulos=DB::table('articulo')->where('nombre','LIKE','%'.$query.'%')
            ->where ('estado','=','1')
            ->orderBy('idArticulo','desc')
            ->paginate(7);
            return view('almacen.articulo.index',["articulos"=>$articulos,"searchText"=>$query]);
        }
    }

    public function create()
    {
    	return view("almacen.articulo.create");
    }

    public function store(ArticuloFormRequest $request)
    {
    	$articulo=new Articulo;
        $articulo->nombre=$request->get('nombre');
        $articulo->descripcion=$request->get('descripcion');
        $articulo->precio=$request->get('precioVenta');
        $articulo->estado='1';
        $articulo->save();
        return Redirect::to('almacen/articulo');
    }

    public function show($id)
    {
    	return view("almacen.articulo.show",["articulo"=>Articulo::findOrFail($id)]);
    }

    public function edit()
    {
    	return view("almacen.articulo.edit",["articulo"=>Articulo::findOrFail($id)]);
    }

    public function update(ArticuloFormRequest $request,$id)
    {
    	$articulo=Articulo::findOrFail($id);
        $articulo->nombre=$request->get('nombre');
        $articulo->descripcion=$request->get('descripcion');
        $articulo->precio=$request->get('precioVenta');
        $articulo->update();
        return Redirect::to('almacen/articulo');
    }

    public function destroy()
    {
    	$articulo=Categoria::findOrFail($id);
        $articulo->estado='0';
        $articulo->update();
        return Redirect::to('almacen/articulo');
    }

}
