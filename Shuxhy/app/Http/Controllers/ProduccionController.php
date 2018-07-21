<?php

namespace Shuxhy\Http\Controllers;

use Illuminate\Http\Request;

use Shuxhy\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input; // Para poder subir archivos e imagenes
use Shuxhy\Http\Requests\ProduccionFormRequest;
use Shuxhy\Produccion;
use DB;

use Carbon\Carbon;
use Response; 
use Illuminate\Support\Collection;



class ProduccionController extends Controller
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
            $producciones=DB::table('produccion as p')
            ->select('p.IdProduccion', 'p.Estatus',  'p.Condicion', 'p.Fecha', 'p.Comentario', 'p.CantidadProducir', 'p.CantidadProducida', 'p.CantidadFaltante')
            ->where('p.Fecha','LIKE','%'.$query.'%')
            ->where ('p.Condicion','=','1') 
            ->orderBy('p.IdProduccion', 'desc')
            ->groupBy('p.IdProduccion', 'p.Estatus',  'p.Condicion', 'c.Fecha' , 'p.Comentario', 'p.CantidadProducir', 'p.CantidadProducida', 'p.CantidadFaltante')
            ->paginate(7);
            return view('almacen.produccion.index',["producciones"=>$producciones,"searchText"=>$query]);

        }
    }


     public function create() // Lo que me falla debe de ser el script
    {
        

        $recetas=DB::table('receta as r')
        ->join('detallereceta as dr', 'r.IdReceta','=','dr.IdReceta')
        ->join('producto as p', 'r.IdProducto','=','p.IdProducto')
        ->join('material as mat', 'dr.IdMaterial','=','mat.IdMaterial')
        ->select(DB::raw('CONCAT(r.Nombre, " ", r.Descripcion ) AS receta'),'r.IdReceta', 'r.Porcion', 'p.stock', 'mat.stock')
        ->where('r.Condicion','=','1')
        ->get();



              
        return view('almacen.produccion.create',["recetas"=>$recetas]);

    }
    public function store (ProduccionFormRequest $request)  // Funcion para crear 
    {



        $produccion=new Produccion;
        $produccion->IdReceta=$request->get('IdReceta');
        $produccion->Estatus=$request->get('Estatus');
        $mytime=Carbon::now('America/Lima');
        $produccion->Fecha=$mytime->toDateTimeString();
        $produccion->CantidadFaltante=$request->get('CantidadFaltante');
        $produccion->CantidadProducir=$request->get('CantidadProducir');
        $produccion->CantidadProducida=$request->get('CantidadProducida');
        $produccion->Comentario=$request->get('Comentario');
        $produccion->Condicion='1';
        $produccion->save();
        
      // $producto=Producto::findOrFail($id);
       //$producto->stock=$request->get('CantidadProducida');
       //$producto->update();

        
        return Redirect::to('almacen/produccion');

    }


    public function show($id)
    {

        $produccion=DB::table('produccion as p')
            ->join('pedido as ped', 'p.IdPedido','=','ped.IdPedido')
            ->join('detalleproduccion as dp', 'p.IdProduccion','=','dp.IdProduccion')
            ->select('p.IdProduccion', 'p.Estatus',  'p.Condicion', 'p.Fecha', 'p.Comentario')
            ->where('p.IdProduccion', '=', $id)
            ->first();


        return view("almacen.produccion.show",["produccion"=>$produccion]
        );
    }


     public function edit($id)
    {
        return view("almacen.produccion.edit",["produccion"=>Produccion::findOrFail($id)]);
    }
    public function update(ProduccionFormRequest $request,$id)  // funcion para editar
    {

        

        $produccion=Produccion::findOrFail($id);
        $produccion->IdReceta=$request->get('IdReceta');
        $produccion->Estatus=$request->get('Estatus');
        $mytime=Carbon::now('America/Lima');
        $produccion->Fecha=$mytime->toDateTimeString();
        $produccion->CantidadFaltante=$request->get('CantidadFaltante');
        $produccion->CantidadProducir=$request->get('CantidadProducir');
        $produccion->CantidadProducida=$request->get('CantidadProducida');
        $produccion->Comentario=$request->get('Comentario');
        
        $pedido->update();

        $producto=Producto::findOrFail($id);
        $producto->stock=$request->get('CantidadProducida');

        
        return Redirect::to('almacen/produccion');
    }


    public function destroy($id)  // funcion para borrar
    {
        $produccion=Produccion::findOrFail($id);
        $produccion->Condicion='0';
        $produccion->update();
        return Redirect::to('almacen/produccion');
    }

}
