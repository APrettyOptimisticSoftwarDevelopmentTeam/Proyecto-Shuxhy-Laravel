<?php

namespace Shuxhy\Http\Controllers;

use Illuminate\Http\Request;

use Shuxhy\Http\Requests;
use Shuxhy\Unidad;
use Illuminate\Support\Facades\Redirect;
use Shuxhy\Http\Requests\UnidadFormRequest;
use DB;

class UnidadController extends Controller
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
            $unidades=DB::table('unidad')->where('Nombre','LIKE','%'.$query.'%')
            ->where ('Condicion','=','1')
            ->orderBy('IdUnidad','desc')
            ->paginate(7);
            return view('almacen.unidad.index',["unidades"=>$unidades,"searchText"=>$query]);
        }
    }
    public function create()
    {
        return view("almacen.unidad.create");
    }
    public function store (UnidadFormRequest $request)  // Funcion para crear 
    {
        $unidad=new Unidad;
        $unidad->Nombre=$request->get('Nombre');
        $unidad->Abreviatura=$request->get('Abreviatura');
        $unidad->Condicion='1';
        $unidad->save();
        return Redirect::to('almacen/unidad');

    }
    public function show($id)
    {
        return view("almacen.unidad.show",["unidad"=>Unidad::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("almacen.unidad.edit",["unidad"=>Unidad::findOrFail($id)]);
    }
    public function update(UnidadFormRequest $request,$id)  // funcion para editar
    {
        $unidad=Unidad::findOrFail($id);
        $unidad->Nombre=$request->get('Nombre');
        $unidad->Abreviatura=$request->get('Abreviatura');
        $unidad->update();
        return Redirect::to('almacen/unidad');
    }
    public function destroy($id)  // funcion para borrar
    {
        $unidad=Unidad::findOrFail($id);
        $unidad->Condicion='0';
        $unidad->update();
        return Redirect::to('almacen/unidad');
    }
}
