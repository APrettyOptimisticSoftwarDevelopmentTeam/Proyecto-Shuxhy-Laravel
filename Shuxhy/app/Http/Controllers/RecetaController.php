<?php

namespace Shuxhy\Http\Controllers;

use Illuminate\Http\Request;

use Shuxhy\Http\Requests;
use Shuxhy\Receta;
use Shuxhy\DetalleReceta;
use Illuminate\Support\Facades\Redirect;
use Shuxhy\Http\Requests\RecetaFormRequest;
use DB;

class RecetaController extends Controller
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
            $recetas=DB::table('receta')->where('NombreReceta','LIKE','%'.$query.'%')
            ->where ('Condicion','=','1')
            ->orderBy('IdReceta','desc')
            ->paginate(7);
            return view('almacen.receta.index',["recetas"=>$recetas,"searchText"=>$query]);
        }
    }
    public function create()
    {
        return view("almacen.receta.create");
    }
    public function store (RecetaFormRequest $request)  // Funcion para crear 
    {
        $receta=new Receta;
        $receta->NombreReceta=$request->get('NombreReceta');
        $receta->Descripcion=$request->get('Descripcion');
        $receta->Equipo=$request->get('Equipo');
        $receta->TiempoPreparacion=$request->get('TiempoPreparacion');
        $receta->condicion='1';
        $receta->save();
        return Redirect::to('almacen/receta');

    }
    public function show($id)
    {
        return view("almacen.receta.show",["receta"=>Receta::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("almacen.receta.edit",["receta"=>Receta::findOrFail($id)]);
    }
    public function update(RecetaFormRequest $request,$id)  // funcion para editar
    {
        $receta=Receta::findOrFail($id);
        $receta->NombreReceta=$request->get('NombreReceta');
        $receta->Descripcion=$request->get('Descripcion');
        $receta->Equipo=$request->get('Equipo');
        $receta->TiempoPreparacion=$request->get('TiempoPreparacion');
        $receta->update();
        return Redirect::to('almacen/receta');
    }
    public function destroy($id)  // funcion para borrar
    {
        $receta=Receta::findOrFail($id);
        $receta->Condicion='0';
        $receta->update();
        return Redirect::to('almacen/receta');
    }

}

