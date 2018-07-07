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
<<<<<<< HEAD
            $unidades=DB::table('unidad')->where('nombre','LIKE','%'.$query.'%')
            ->where ('condicion','=','1')
            ->orderBy('IdUnidad','desc')
            ->paginate(7);
            return view('administracion.unidad.index',["unidades"=>$unidades,"searchText"=>$query]);
=======
            $unidades=DB::table('unidad')->where('Nombre','LIKE','%'.$query.'%')
            ->where ('Condicion','=','1')
            ->orderBy('IdUnidad','desc')
            ->paginate(7);
            return view('almacen.unidad.index',["unidades"=>$unidades,"searchText"=>$query]);
>>>>>>> 173bb7ffc094f04cc27d35538d39f23540eae0b1
        }
    }
    public function create()
    {
<<<<<<< HEAD
        return view("administracion.unidad.create");
=======
        return view("almacen.unidad.create");
>>>>>>> 173bb7ffc094f04cc27d35538d39f23540eae0b1
    }
    public function store (UnidadFormRequest $request)  // Funcion para crear 
    {
        $unidad=new Unidad;
<<<<<<< HEAD
        $unidad->nombre=$request->get('Nombre');
        $unidad->abreviatura=$request->get('Abreviatura');
        $unidad->condicion='1';
        $unidad->save();
        return Redirect::to('administracion/unidad');
=======
        $unidad->Nombre=$request->get('Nombre');
        $unidad->Abreviatura=$request->get('Abreviatura');
        $unidad->Condicion='1';
        $unidad->save();
        return Redirect::to('almacen/unidad');
>>>>>>> 173bb7ffc094f04cc27d35538d39f23540eae0b1

    }
    public function show($id)
    {
<<<<<<< HEAD
        return view("administracion.unidad.show",["unidad"=>Unidad::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("administracion.unidad.edit",["unidad"=>Unidad::findOrFail($id)]);
=======
        return view("almacen.unidad.show",["unidad"=>Unidad::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("almacen.unidad.edit",["unidad"=>Unidad::findOrFail($id)]);
>>>>>>> 173bb7ffc094f04cc27d35538d39f23540eae0b1
    }
    public function update(UnidadFormRequest $request,$id)  // funcion para editar
    {
        $unidad=Unidad::findOrFail($id);
<<<<<<< HEAD
        $unidad->nombre=$request->get('Nombre');
        $unidad->abreviatura=$request->get('Abreviatura');
        $unidad->update();
        return Redirect::to('administracion/unidad');
=======
        $unidad->Nombre=$request->get('Nombre');
        $unidad->Abreviatura=$request->get('Abreviatura');
        $unidad->update();
        return Redirect::to('almacen/unidad');
>>>>>>> 173bb7ffc094f04cc27d35538d39f23540eae0b1
    }
    public function destroy($id)  // funcion para borrar
    {
        $unidad=Unidad::findOrFail($id);
<<<<<<< HEAD
        $unidad->condicion='0';
        $unidad->update();
        return Redirect::to('administracion/unidad');
    }

=======
        $unidad->Condicion='0';
        $unidad->update();
        return Redirect::to('almacen/unidad');
    }
>>>>>>> 173bb7ffc094f04cc27d35538d39f23540eae0b1
}
