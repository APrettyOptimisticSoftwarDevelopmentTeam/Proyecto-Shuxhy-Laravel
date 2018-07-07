<?php

namespace Shuxhy\Http\Controllers;

use Illuminate\Http\Request;

use Shuxhy\Http\Requests;
use Shuxhy\Relleno;
use Illuminate\Support\Facades\Redirect;
use Shuxhy\Http\Requests\RellenoFormRequest;
use DB;

class RellenoController extends Controller
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
            $rellenos=DB::table('relleno')->where('Nombre','LIKE','%'.$query.'%')
            ->where ('Condicion','=','1')
            ->orderBy('IdRelleno','desc')
            ->paginate(7);
            return view('almacen.relleno.index',["rellenos"=>$rellenos,"searchText"=>$query]);
        }
    }
    public function create()
    {
        return view("almacen.relleno.create");
    }
    public function store (RellenoFormRequest $request)  // Funcion para crear 
    {
        $relleno=new Relleno;
        $relleno->Nombre=$request->get('Nombre');
        $relleno->Abreviatura=$request->get('Abreviatura');
        $relleno->Condicion='1';
        $relleno->save();
        return Redirect::to('almacen/relleno');

    }
    public function show($id)
    {
        return view("almacen.relleno.show",["relleno"=>Relleno::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("almacen.relleno.edit",["relleno"=>Relleno::findOrFail($id)]);
    }
    public function update(RellenoFormRequest $request,$id)  // funcion para editar
    {
        $relleno=Relleno::findOrFail($id);
        $relleno->Nombre=$request->get('Nombre');
        $relleno->Abreviatura=$request->get('Abreviatura');
        $relleno->update();
        return Redirect::to('almacen/relleno');
    }
    public function destroy($id)  // funcion para borrar
    {
        $relleno=Relleno::findOrFail($id);
        $relleno->Condicion='0';
        $relleno->update();
        return Redirect::to('almacen/relleno');
    }
}
