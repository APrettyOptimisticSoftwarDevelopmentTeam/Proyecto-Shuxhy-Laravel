<?php

namespace Shuxhy\Http\Controllers;

use Illuminate\Http\Request;

use Shuxhy\Http\Requests;
use Shuxhy\Material;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Shuxhy\Http\Requests\MaterialFormRequest;
use DB;

class MaterialController extends Controller
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
            $materiales=DB::table('material')->where('Nombre','LIKE','%'.$query.'%')
            ->where ('Condicion','=','1')
            ->orderBy('IdMaterial','desc')
            ->paginate(7);
            return view('almacen.material.index',["materiales"=>$materiales,"searchText"=>$query]);
        }
    }
    public function create()
    {
        return view("almacen.material.create");
    }
    public function store (MaterialFormRequest $request)  // Funcion para crear 
    {
        

        $material=new Material;
        $material->Nombre=$request->get('Nombre');
        $material->Descripcion=$request->get('Descripcion');
        $material->Costo=$request->get('Costo');
        $material->Unidad=$request->get('Unidad');


        if (Input::hasFile('Imagen')) 
        {
            $file=Input::file('Imagen');
            $file->move(public_path(). 'imagenes/materiales/', $file->getClientOriginalName());
            $material->Imagen=$file->getClientOriginalName();
        }


        $material->Condicion='1';
        $material->save();
        return Redirect::to('almacen/material');

    }
    public function show($id)
    {
        return view("almacen.material.show",["material"=>Material::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("almacen.material.edit",["material"=>Material::findOrFail($id)]);
    }
    public function update(MaterialFormRequest $request,$id)  // funcion para editar
    {
        
        $material=Material::findOrFail($id);
        $material->Nombre=$request->get('Nombre');
        $material->Descripcion=$request->get('Descripcion');
        $material->Costo=$request->get('Costo');
        $material->Unidad=$request->get('Unidad');
       


         if (Input::hasFile('Imagen')) 
        {
            $file=Input::file('Imagen');
            $file->move(public_path(). 'imagenes/materiales/', $file->getClientOriginalName());
            $material->Imagen=$file->getClientOriginalName();
        }


        $material->update();
        return Redirect::to('almacen/material');
    }
    public function destroy($id)  // funcion para borrar
    {
        $material=Material::findOrFail($id);
        $material->Condicion='0';
        $material->update();
        return Redirect::to('almacen/material');
    }
}
