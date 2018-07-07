<?php

namespace Shuxhy\Http\Controllers;

use Illuminate\Http\Request;

use Shuxhy\Http\Requests;
use Shuxhy\Sabor;
use Illuminate\Support\Facades\Redirect;
use Shuxhy\Http\Requests\SaborFormRequest;
use DB;

class SaborController extends Controller
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
            $sabores=DB::table('sabor')->where('Nombre','LIKE','%'.$query.'%')
            ->where ('Condicion','=','1')
            ->orderBy('IdsSabor','desc')
            ->paginate(7);
            return view('almacen.sabor.index',["sabores"=>$sabores,"searchText"=>$query]);
        }
    }
    public function create()
    {
        return view("almacen.sabor.create");
    }
    public function store (SaborFormRequest $request)  // Funcion para crear 
    {
        $sabor=new Sabor;
        $sabor->Nombre=$request->get('Nombre');
        $sabor->Abreviatura=$request->get('Abreviatura');
        $sabor->Condicion='1';
        $sabor->save();
        return Redirect::to('almacen/sabor');

    }
    public function show($id)
    {
        return view("almacen.sabor.show",["sabor"=>Sabor::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("almacen.sabor.edit",["sabor"=>Sabor::findOrFail($id)]);
    }
    public function update(SaborFormRequest $request,$id)  // funcion para editar
    {
        $sabor=Sabor::findOrFail($id);
        $sabor->Nombre=$request->get('Nombre');
        $sabor->Abreviatura=$request->get('Abreviatura');
        $sabor->update();
        return Redirect::to('almacen/sabor');
    }
    public function destroy($id)  // funcion para borrar
    {
        $sabor=Sabor::findOrFail($id);
        $sabor->Condicion='0';
        $sabor->update();
        return Redirect::to('almacen/sabor');
    }
}
