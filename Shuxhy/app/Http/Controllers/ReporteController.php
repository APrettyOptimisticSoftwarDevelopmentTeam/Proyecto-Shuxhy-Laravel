<?php

namespace Shuxhy\Http\Controllers;

use Illuminate\Http\Request;

use Shuxhy\Http\Requests;


use Illuminate\Support\Facades\Redirect;
use Shuxhy\Http\Requests\ReporteFormRequest;
use Shuxhy\Factura;
use PdfReport;
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

    // Do some querying..
   // $queryBuilder = Table('Factura')::select(['FormaPago', 'TotalFacturado', 'Fecha'])
     //                   ->whereBetween('Fecha', [$fromDate, $toDate]);
     
     $queryBuilder = Factura::select('FormaPago', 'TotalFacturado', 'Fecha')
                        ->whereBetween('Fecha', array($fromDate, $toDate))
                        ->get();
                                    

    // Set Column to be displayed
    $columns = [
        'FormaPago' => 'FormaPago',
        'Fecha', // if no column_name specified, this will automatically seach for snake_case of column name (will be registered_at) column from query result
        'TotalFacturado' => 'Balance',
        'Categoria' => function($result) { // You can do if statement or any action do you want inside this closure
            return ($result->Balance > 1000) ? 'Orden Grande' : 'Orden Normal';
        }
    ];

    /*
        Generate Report with flexibility to manipulate column class even manipulate column value (using Carbon, etc).

        - of()         : Init the title, meta (filters description to show), query, column (to be shown)
        - editColumn() : To Change column class or manipulate its data for displaying to report
        - editColumns(): Mass edit column
        - showTotal()  : Used to sum all value on specified column on the last table (except using groupBy method). 'point' is a type for displaying total with a thousand separator
        - groupBy()    : Show total of value on specific group. Used with showTotal() enabled.
        - limit()      : Limit record to be showed
        - make()       : Will producing DomPDF / SnappyPdf instance so you could do any other DomPDF / snappyPdf method such as stream() or download()
    */ 

return PdfReport::of($title, $meta, $queryBuilder, $columns)
                ->editColumn('Fecha', [
                    'displayAs' => function($result) {
                        return $result->Fecha->format('Y M D');
                    }
                ])
                ->editColumn('TotalFacturado', [
                    'displayAs' => function($result) {
                        return thousandSeparator($result->Balance);
                    }
                ])
                ->editColumns(['TotalFacturado', 'Categoria'], [
                    'class' => 'right bold'
                ])
                ->showTotal([
                    'Total Balance' => '$' // if you want to show dollar sign ($) then use 'Total Balance' => '$'
                ])
                ->limit(20)
                ->stream('prueba'); // or download('filename here..') to download pdf    
} 
    /**
     * Display a listing of the resource.
     *
      @return \Illuminate\Http\Response
     */
   /* public function index()
    {
         return view('Reportes.ventas.index');
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Reportes.ventas.displayreport'); //Mira si le quito el show la ruta no me funciona y no entiendo por que
         // return view('Reportes.ventas.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
  /*  public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
      @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   /* public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function destroy($id)
    {
        //
    }*/



}


