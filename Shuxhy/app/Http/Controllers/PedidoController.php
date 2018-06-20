<?php

namespace Shuxhy\Http\Controllers;

use Illuminate\Http\Request;

use Shuxhy\Http\Requests;
use Shuxhy\Pedido;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input; // Para poder subir archivos e imagenes
use Shuxhy\Http\Requests\PedidoFormRequest;
use Shuxhy\DetallePedido;
use DB;

use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;


class PedidoController extends Controller
{
    public function __construct()
    {

    }
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $pedido=DB::table('pedido as p')
            ->join('cliente as c', 'p.IdPedido','=','c.IdCliente')
            ->join('detellepedido as dp', 'p.IdPedido','=','dp.IdDetallePedido')
            ->select('p.IdPedido', 'c.Nombre', DB::raw('sum(dp.cantidad*PrecioPorUnidad) as total'))
            ->where('c.Nombre','LIKE','%'.$query.'%')
            ->orderBy('p.IdPedido', 'desc')
            ->groupBy('p.IdPedido', 'c.Nombre')
            ->paginate(7);
            return view('almacen.pedido.index',["pedidos"=>$pedidos,"searchText"=>$query]);

        }
    }


     public function create()
    {
    	$clientes=DB::table('cliente')->get();
    	$productos=DB::table('producto as prod')
    	->select(DB::raw('CONCAT(pro.Relleno, " ", prod.Nombre)AS producto'),'prod.IdProducto')
    	->where('prod.Condicion','=','1')
    	->get();

        return view('almacen.pedido.create',["clientes"=>$clientes,"productos"=>$productos]);
    }

    public function store (PedidoFormRequest $request)  // Funcion para crear 
    {

    	try
    	{

    		DB::beginTransaction();

    	$pedido=new Pedido;
        $pedido->nombre=$request->get('Nombre');
        $pedido->IdCliente=$request->get('IdCliente');
        $pedido->EntregaPedido=$request->get('EntregaPedido');
        $pedido->DireccionEntrega=$request->get('DireccionEntrega');
        $mytime = Carbon::now('America/Lima');
        $pedido->FechaRealizado=$mytime->toDateTimeString();
        $pedido->FechaEntrega=$mytime->toDateTimeString();
        $pedido->Descripcion=$request->get('Descripcion');
        $pedido->condicion='1';
        $pedido->save();

        $IdProducto=$request->get('IdProducto')
        $cantidad=$request->get('Cantidad')
        $PrecioPorUnidad=$request->get('PrecioPorUnidad')

        $cont=0;

        while ($cont < (count($IdProducto))) 
        {
        	$DetallePedido=new DetallePedido();
        	$DetallePedido->IdPedido=$IdPedido[$cont];
        	$DetallePedido->IdProducto=$IdProducto[$cont];
        	$DetallePedido->Cantidad=$Cantidad[$cont];
        	$DetallePedido->PrecioPorUnidad=$PrecioPorUnidad[$cont];
        	$DetallePedido->save();
        	$cont=$cont+1;



        }


    		DB::commit();

    	}catch(\Exception $e)
    	{

    		DB::rollback();

    	}


        
        return Redirect::to('almacen/pedido');

    }


    public function show($id)
    {

    	$pedido=DB::table('pedido as p')
            ->join('cliente as c', 'p.IdPedido','=','c.IdCliente')
            ->join('detellepedido as dp', 'p.IdPedido','=','dp.IdDetallePedido')
            ->select('p.IdPedido', 'c.Nombre', DB::raw('sum(dp.cantidad*PrecioPorUnidad) as total'))
            ->where('p.IdPedido', '=', $id)
            ->first();

            $DetallePedido=DB::table('DetallePedido as dp')
            ->join('producto as pr', 'pr.IdProducto','=','dp.IdProducto')
            ->select('pr.Nombre as producto', 'dp.Cantidad', 'dp.PrecioPorUnidad')
            ->where('dp.IdDetallePedido', '=', $id)
            ->get();

        return view("almacen.pedido.show",["pedido"=>$pedido,"DetallePedido"=>$DetallePedido);
    }


    public function destroy($id)  // funcion para borrar
    {
        $pedido=Pedido::findOrFail($id);
        $pedido->condicion='0';
        $pedido->update();
        return Redirect::to('almacen/pedido');
    }


}
