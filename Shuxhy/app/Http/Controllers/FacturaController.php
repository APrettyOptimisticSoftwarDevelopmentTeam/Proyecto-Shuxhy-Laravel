<?php

namespace Shuxhy\Http\Controllers;

use Illuminate\Http\Request;

use Shuxhy\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input; // Para poder subir archivos e imagenes
use Shuxhy\Http\Requests\FacturaFormRequest;
use Shuxhy\Factura;
use Shuxhy\DetalleFactura;
use DB;

use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;


class FacturaController extends Controller
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
            $facturas=DB::table('factura as f')
            ->join('detallefactura as df', 'f.IdFactura','=','df.IdFactura')
            ->select('f.IdFactura', 'f.Fecha', 'f.FormaPago', 'f.Condicion','f.TotalFacturado')
            ->where('f.IdFactura','LIKE','%'.$query.'%')
            ->where ('f.Condicion','=','1') 
            ->orderBy('f.IdFactura', 'desc')
            ->groupBy('f.IdFactura', 'f.Fecha', 'f.FormaPago', 'f.Condicion','f.TotalFacturado')
            ->paginate(7);
            return view('almacen.factura.index',["facturas"=>$facturas,"searchText"=>$query]);

        }
    }


     public function create() // Lo que me falla debe de ser el script
    {
        $productos=DB::table('producto as prod')
        ->select(DB::raw('CONCAT(prod.Nombre, " ", prod.Descripcion ) AS producto'),'prod.IdProducto', 'prod.Precio')
        ->where('prod.Condicion','=','1')
        ->get();

        $pedidos=DB::table('pedido as ped')
        ->select(DB::raw('CONCAT(ped.DireccionEntrega, " ", ped.FechaEntrega) AS pedido'),'ped.IdPedido', 'ped.Total')
        ->where('ped.Condicion','=','1')
        ->get();

        $combos=DB::table('combo as com')
        ->select(DB::raw('CONCAT(com.Nombre, " ", com.Descripcion) AS combo'),'com.IdCombo', 'com.Total')
        ->where('com.Condicion','=','1')
        ->get();    

    
        return view('almacen.factura.create',["productos"=>$productos,"pedidos"=>$pedidos,"combos"=>$combos]);

    }

    public function store (FacturaFormRequest $request)  // Funcion para crear 
    {

        //try
        //{

        DB::beginTransaction();
        $factura=new Factura;
        $factura->TotalFacturado=$request->get('TotalFacturado');
        $mytime=Carbon::now('America/Lima');
        $factura->Fecha=$mytime->toDateTimeString();
        $factura->FormaPago=$request->get('FormaPago');
        $factura->Condicion='1';
        $factura->save();

        $IdPedido = $request->get('IdPedido');
        $IdProducto = $request->get('IdProducto');
        $IdCombo = $request->get('IdCombo');


        $Cantidad = $request->get('Cantidad');
        $CantidadCombo = $request->get('CantidadCombo');

        $PrecioProd = $request->get('PrecioProd');
        $PrecioComb = $request->get('PrecioComb');
        $PrecioPed = $request->get('PrecioPed');


        $cont=0;

        while ($cont < (count($IdProducto))) 
        {
            $DetalleFactura = new DetalleFactura();
            $DetalleFactura->IdFactura=$factura->IdFactura;
            $DetalleFactura->IdProducto=$IdProducto[$cont];
            $DetalleFactura->IdCombo=$IdCombo[$cont];
            $DetalleFactura->IdPedido=$IdPedido[$cont];
            $DetalleFactura->Cantidad=$Cantidad[$cont];
            $DetalleFactura->CantidadCombo=$CantidadCombo[$cont];
            $DetalleFactura->PrecioProd=$PrecioProd[$cont];
            $DetalleFactura->PrecioComb=$PrecioComb[$cont];
            $DetalleFactura->PrecioPed=$PrecioPed[$cont];
            $DetalleFactura->save();
            $cont=$cont+1;



        }


            DB::commit();

        //}
        //catch(\Exception $e)
        //{

        //  DB::rollback();

        //}


        
        return Redirect::to('almacen/factura');

    }


    public function show($id)
    {

        $factura=DB::table('factura as f')
            ->join('detallefactura as df', 'f.IdFactura','=','df.IdFactura')
            ->select('f.IdFactura', 'f.Fecha', 'f.FormaPago', 'f.Condicion','f.TotalFacturado')
            ->where('f.IdFactura', '=', $id)
            ->first();

            $DetalleFactura=DB::table('DetalleFactura as df')
            ->join('producto as prod', 'df.IdProducto','=','prod.IdProducto')
            ->join('combo as com', 'df.IdCombo','=','com.IdCombo')
            //->join('pedido as ped', 'df.IdPedido','=','ped.IdPedido')
            ->select('prod.Nombre as producto', 'df.Cantidad', 'df.CantidadCombo','df.PrecioProd', 'com.Nombre as combo', 'df.PrecioComb', 'df.PrecioPed')
            ->where('df.IdFactura', '=', $id)
            ->get();

        return view("almacen.factura.show",["factura"=>$factura,"DetalleFactura"=>$DetalleFactura]
        );
    }


    public function destroy($id)  // funcion para borrar
    {
        $factura=Factura::findOrFail($id);
        $factura->Condicion='0';
        $factura->update();
        return Redirect::to('almacen/factura');
    }



}
    




