<?php

namespace Shuxhy\Http\Controllers;

use Illuminate\Http\Request;

use Shuxhy\Http\Requests;


use Illuminate\Support\Facades\Redirect;
use Shuxhy\Http\Requests\ReporteFormRequest;
use Shuxhy\Factura;
use PdfReport;
use PDF;
use DB;

class ReporteController extends Controller
{


  public function displayReport(Request $request) {
    // Retrieve any filters
    $fromDate = $request->input('Desde');   // Se supone que aqui obtengo el la fecha de inicio desde donde buscare mis facturas
    $toDate = $request->input('Hasta');// Se supone que aqui obtengo la fecha de final desde donde buscare mis facturas


    // Report title
    $title = 'Facturas Generadas'; //Titulo del report

    // For displaying filters description on header
    $meta = [
        'Desde ' => $fromDate . ' Hasta ' . $toDate   //Lo que va a mostrar en la cabecera
    ];

 
    $queryBuilder = Factura::select('FormaPago', 'TotalFacturado', 'Fecha')
                    ->whereBetween('Fecha', [$fromDate, $toDate]);
               

                                    

    // Set Column to be displayed
    $columns = [
        'FormaPago' => 'FormaPago', 
        'Fecha' =>'Fecha', // if no column_name specified, this will automatically seach for snake_case of column name (will be registered_at) column from query result
        'TotalFacturado' => 'TotalFacturado'
      
    ];




#$pdf = PDF::loadview('pdf.invoice',$queryBuilder);
         #  dd($queryBuilder);

  

return PdfReport::of($title, $meta, $queryBuilder, $columns)
                ->editColumn('Fecha', [
                    'displayAs' => function($result) {
                        return  $result->Fecha;
                    }
                ])
                ->editColumn('TotalFacturado', [
                    'displayAs' => function($result) {
                        return  $result->TotalFacturado;
                    }
                ])
                ->editColumns(['TotalFacturado'], [
                    'class' => 'right bold'
                ])
                ->showTotal([
                    'TotalFacturado' => '$' // if you want to show dollar sign ($) then use 'Total Balance' => '$'
                ])
                ->limit(20)
                ->stream('prueba'); // or download('filename here..') to download pdf    */

} 
    
    public function create()
    {
        return view('Reportes.ventas.displayreport'); //Mira si le quito el show la ruta no me funciona y no entiendo por que
         // return view('Reportes.ventas.create');
        //
    }

   
    public function show($id)
    {
        
    }


}


