<?php

namespace Shuxhy\Http\Controllers;

use Illuminate\Http\Request;

use Shuxhy\Http\Requests;
use Shuxhy\Material;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Shuxhy\Http\Requests\MaterialFormRequest;
use DB;

use Response; 
use Illuminate\Support\Collection;

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
            $materiales=DB::table('material as m')
            ->join('unidad as u', 'm.IdUnidad','=','u.IdUnidad')
            ->select('m.IdMaterial', 'm.Nombre', 'm.Descripcion', 'm.Costo', 'm.Imagen', 'm.Condicion', 'u.Abreviatura')
            ->where('m.Nombre','LIKE','%'.$query.'%')
            ->where ('m.Condicion','=','1') 
            ->orderBy('m.IdMaterial', 'desc')
            ->groupBy('m.IdMaterial', 'm.Nombre', 'm.Descripcion', 'm.Costo', 'm.Imagen', 'm.Condicion',  'u.Abreviatura')
            ->paginate(7);
            return view('almacen.material.index',["materiales"=>$materiales,"searchText"=>$query]);

        }
    }
    public function create()
    {

        $unidades=DB::table('unidad as u' )
        ->select(DB::raw('CONCAT(u.Nombre, " ", u.Abreviatura) AS unidad'),'u.IdUnidad')
        ->where('u.Condicion','=','1')
        ->get();

        return view('almacen.material.create',["unidades"=>$unidades]);

    }
    public function store (MaterialFormRequest $request)  // Funcion para crear 
    {
        

        $material=new Material;
        $material->Nombre=$request->get('Nombre');
        $material->Descripcion=$request->get('Descripcion');
        $material->Costo=$request->get('Costo');
     


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
