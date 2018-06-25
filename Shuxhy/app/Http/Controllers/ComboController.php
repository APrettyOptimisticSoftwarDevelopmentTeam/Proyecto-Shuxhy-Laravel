<?php

namespace Shuxhy\Http\Controllers;

use Illuminate\Http\Request;

use Shuxhy\Http\Requests;
use Shuxhy\Combo;
use Shuxhy\DetalleCombo;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input; // Para poder subir archivos e imagenes
use Shuxhy\Http\Requests\ComboFormRequest;
use DB;

class ComboController extends Controller
{
     public function __construct()
    {

    }
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $combos=DB::table('combo')->where('Nombre','LIKE','%'.$query.'%')
            ->where ('Condicion','=','1')
            ->orderBy('IdCombo','desc')
            ->paginate(7);
            return view('almacen.combo.index',["combos"=>$combos,"searchText"=>$query]);
        }
    }
    public function create()
    {
        return view("almacen.combo.create");
    }
    public function store (ComboFormRequest $request)  // Funcion para crear 
    {
        $combo=new Combo;
        $combo->Nombre=$request->get('Nombre');
        $combo->Descripcion=$request->get('Descripcion');
        $combo->Subtotal=$request->get('Subtotal');
        $combo->Descuento=$request->get('Descuento');
        $combo->Total=$request->get('Total');
        
        if (Input::hasFile('Imagen')) 
        {
            $file=Input::file('Imagen');
            $file->move(public_path(). 'imagenes/combos/', $file->getClientOriginalName());
            $combo->Imagen=$file->getClientOriginalName();
        }


        $combo->Condicion='1';
        $combo->save();
        return Redirect::to('almacen/combo');

    }
    public function show($id)
    {
        return view("almacen.combo.show",["combo"=>Combo::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("almacen.combo.edit",["combo"=>Combo::findOrFail($id)]);
    }
    public function update(ComboFormRequest $request,$id)  // funcion para editar
    {
        $combo=Combo::findOrFail($id);
        $combo->Nombre=$request->get('Nombre');
        $combo->Descripcion=$request->get('Descripcion');
        $combo->Subtotal=$request->get('Subtotal');
        $combo->Descuento=$request->get('Descuento');
        $combo->Total=$request->get('Total');
        
        if (Input::hasFile('Imagen')) 
        {
            $file=Input::file('Imagen');
            $file->move(public_path(). 'imagenes/combos/', $file->getClientOriginalName());
            $combo->Imagen=$file->getClientOriginalName();
        }

        $combo->update();
        return Redirect::to('almacen/combo');
    }
    public function destroy($id)  // funcion para borrar
    {
        $combo=Combo::findOrFail($id);
        $combo->Condicion='0';
        $combo->update();
        return Redirect::to('almacen/combo');
    }
}


