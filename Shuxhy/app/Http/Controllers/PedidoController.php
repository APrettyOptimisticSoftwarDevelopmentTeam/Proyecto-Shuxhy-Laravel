<?php

namespace Shuxhy\Http\Controllers;

use Illuminate\Http\Request;

use Shuxhy\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input; // Para poder subir archivos e imagenes
use Shuxhy\Http\Requests\PedidoFormRequest;
use Shuxhy\Pedido;
use Shuxhy\DetallePedido;
use DB;

use Response; 
use Illuminate\Support\Collection;


class PedidoController extends Controller
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
            $pedidos=DB::table('pedido as p')
            ->join('cliente as c', 'p.IdCliente','=','c.IdCliente')
            ->join('detallepedido as dp', 'p.IdPedido','=','dp.IdPedido')
            ->select('p.IdPedido', 'p.Estatus', 'p.DireccionEntrega', 'p.FechaRealizado', 'p.FechaEntrega', 'p.Comentario', 'p.Condicion', 'c.Nombre', 'p.Total')
            ->where('p.DireccionEntrega','LIKE','%'.$query.'%')
            ->where ('p.Condicion','=','1') 
            ->orderBy('p.IdPedido', 'desc')
            ->groupBy('p.IdPedido', 'p.Estatus', 'p.DireccionEntrega', 'p.FechaRealizado', 'p.FechaEntrega', 'p.Comentario', 'p.Condicion', 'c.Nombre', 'p.Total')
            ->paginate(7);
            return view('almacen.pedido.index',["pedidos"=>$pedidos,"searchText"=>$query]);

        }
    }


     public function create() // Lo que me falla debe de ser el script
    {
    	$clientes=DB::table('cliente as client' )
        ->select(DB::raw('CONCAT(client.Nombre, " ", client.Apellido, " Tel: ", client.Telefono) AS cliente'),'client.IdCliente')
        ->where('client.Condicion','=','1')
        ->get();

    	$productos=DB::table('producto as prod')
    	->select(DB::raw('CONCAT(prod.Nombre, " ", prod.Descripcion ) AS producto'),'prod.IdProducto', 'prod.Precio')
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
        $pedido->IdCliente=$request->get('IdCliente');
        $pedido->Estatus=$request->get('Estatus');
        $pedido->DireccionEntrega=$request->get('DireccionEntrega');
        $pedido->FechaRealizado=$request->get('FechaRealizado');
        $pedido->FechaEntrega=$request->get('FechaEntrega');
        $pedido->Comentario=$request->get('Comentario');
        $pedido->Total=$request->get('Total');
        $pedido->Condicion='1';
        $pedido->save();

        $IdProducto = $request->get('IdProducto');
        $Cantidad = $request->get('Cantidad');
        $PrecioProducto = $request->get('PrecioProducto');

        $cont=0;

        while ($cont < (count($IdProducto))) 
        {
        	$DetallePedido = new DetallePedido();
        	$DetallePedido->IdPedido=$pedido->IdPedido;
        	$DetallePedido->IdProducto=$IdProducto[$cont];
        	$DetallePedido->Cantidad=$Cantidad[$cont];
        	$DetallePedido->PrecioProducto=$PrecioProducto[$cont];
        	$DetallePedido->save();
        	$cont=$cont+1;



        }


    		DB::commit();

    	}
        catch(\Exception $e)
    	{

    		DB::rollback();

    	}


        
        return Redirect::to('almacen/pedido');

    }


    public function show($id)
    {

    	$pedido=DB::table('pedido as p')
            ->join('cliente as c', 'p.IdCliente','=','c.IdCliente')
            ->join('detallepedido as dp', 'p.IdPedido','=','dp.IdPedido')
            ->select('p.IdPedido', 'p.Estatus', 'p.DireccionEntrega', 'p.FechaRealizado', 'p.FechaEntrega', 'p.Comentario', 'p.Condicion', 'c.Nombre', 'p.Total')
            ->where('p.IdPedido', '=', $id)
            ->first();

            $DetallePedido=DB::table('DetallePedido as dp')
            ->join('producto as prod', 'dp.IdProducto','=','prod.IdProducto')
            ->select('prod.Nombre as producto', 'dp.Cantidad', 'dp.PrecioProducto')
            ->where('dp.IdPedido', '=', $id)
            ->get();

        return view("almacen.pedido.show",["pedido"=>$pedido,"DetallePedido"=>$DetallePedido]
        );
    }


    public function destroy($id)  // funcion para borrar
    {
        $pedido=Pedido::findOrFail($id);
        $pedido->Condicion='0';
        $pedido->update();
        return Redirect::to('almacen/pedido');
    }


}
