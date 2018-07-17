<?php

namespace Shuxhy\Http\Controllers;

use Illuminate\Http\Request;

use Shuxhy\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input; // Para poder subir archivos e imagenes
use Shuxhy\Http\Requests\ProduccionFormRequest;
use Shuxhy\Produccion;
use Shuxhy\DetalleProduccion;
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
            ->join('pedido as ped', 'p.IdPedido','=','ped.IdPedido')
            ->join('detalleproduccion as dp', 'p.IdProduccion','=','dp.IdProduccion')
            ->select('p.IdProduccion', 'p.Estatus',  'p.Condicion', 'p.Fecha', 'p.Comentario')
            ->where('p.Fecha','LIKE','%'.$query.'%')
            ->where ('p.Condicion','=','1') 
            ->orderBy('p.IdProduccion', 'desc')
            ->groupBy('p.IdProduccion', 'p.Estatus',  'p.Condicion', 'c.Fecha' , 'p.Comentario')
            ->paginate(7);
            return view('almacen.produccion.index',["producciones"=>$producciones,"searchText"=>$query]);

        }
    }


     public function create() // Lo que me falla debe de ser el script
    {
        
        $pedidos=DB::table('pedido as ped')
        ->select(DB::raw('CONCAT(ped.FechaEntrega, " ", ped.Estatus ) AS pedido'),'ped.IdPedido')
        ->where('ped.Condicion','=','1')
        ->get();

        $recetas=DB::table('receta as r')
        ->select(DB::raw('CONCAT(r.Nombre, " ", r.TiempoPreparacion ) AS receta'),'r.IdReceta', 'r.IdProducto', 'r.Porcion')
        ->where('r.Condicion','=','1')
        ->get();


              
        return view('almacen.produccion.create',["pedidos"=>$pedidos, "recetas"=>$recetas]);

    }
    public function store (ProduccionFormRequest $request)  // Funcion para crear 
    {

        try
        {

        DB::beginTransaction();
        $produccion=new Produccion;
        $produccion->IdPedido=$request->get('IdPedido');
        $produccion->Estatus=$request->get('Estatus');
        
        $mytime=Carbon::now('America/Lima');
       
        $produccion->Fecha=$mytime->toDateTimeString();
        
        $produccion->Comentario=$request->get('Comentario');
        $produccion->Condicion='1';
        $produccion->save();

        $IdReceta = $request->get('IdReceta');
        $CantidadProducir = $request->get('CantidadProducir');
        $CantidadProducida = $request->get('CantidadProducida');
        $CantidadFaltante = $request->get('CantidadFaltante');
        
        $cont=0;

        while ($cont < (count($IdReceta))) 
        {
            $DetalleProduccion = new DetalleProduccion();
            $DetalleProduccion->IdProduccion=$produccion->IdProduccion;
            $DetalleProduccion->IdReceta=$IdReceta[$cont];
            $DetalleProduccion->CantidadProducir=$CantidadProducir[$cont];
            $DetalleProduccion->CantidadProducida=$CantidadProducida[$cont];
            $DetalleProduccion->CantidadFaltante=$CantidadFaltante[$cont];
            $DetalleProduccion->save();
            $cont=$cont+1;



        }


            DB::commit();

        }
        catch(\Exception $e)
        {

            DB::rollback();

        }


        
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

            $DetalleProduccion=DB::table('DetalleProduccion as dp')
            ->join('receta as r', 'dp.IdReceta','=','r.IdReceta')
            ->select('r.Nombre as receta', 'dp.CantidadProducir', 'dp.CantidadProducida', 'dp.CantidadFaltante')
            ->where('dp.IdProduccion', '=', $id)
            ->get();

        return view("almacen.produccion.show",["produccion"=>$produccion,"DetalleProduccion"=>$DetalleProduccion]
        );
    }


     public function edit($id)
    {
        return view("almacen.produccion.edit",["produccion"=>Produccion::findOrFail($id)]);
    }
    public function update(ProduccionFormRequest $request,$id)  // funcion para editar
    {
        $produccion=Produccion::findOrFail($id);
        $produccion->Estatus=$request->get('Estatus');
        $produccion->Comentario=$request->get('Comentario');
        
        $pedido->update();
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
