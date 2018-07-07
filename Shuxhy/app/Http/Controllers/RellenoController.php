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
<<<<<<< HEAD
            $rellenos=DB::table('relleno')->where('nombre','LIKE','%'.$query.'%')
            ->where ('condicion','=','1')
            ->orderBy('IdRelleno','desc')
            ->paginate(7);
            return view('administracion.relleno.index',["rellenos"=>$rellenos,"searchText"=>$query]);
=======
            $rellenos=DB::table('relleno')->where('Nombre','LIKE','%'.$query.'%')
            ->where ('Condicion','=','1')
            ->orderBy('IdRelleno','desc')
            ->paginate(7);
            return view('almacen.relleno.index',["rellenos"=>$rellenos,"searchText"=>$query]);
>>>>>>> 173bb7ffc094f04cc27d35538d39f23540eae0b1
        }
    }
    public function create()
    {
<<<<<<< HEAD
        return view("administracion.rellenos.create");
=======
        return view("almacen.relleno.create");
>>>>>>> 173bb7ffc094f04cc27d35538d39f23540eae0b1
    }
    public function store (RellenoFormRequest $request)  // Funcion para crear 
    {
        $relleno=new Relleno;
<<<<<<< HEAD
        $relleno->nombre=$request->get('Nombre');
        $relleno->abreviatura=$request->get('Abreviatura');
        $relleno->condicion='1';
        $relleno->save();
        return Redirect::to('administracion/relleno');
=======
        $relleno->Nombre=$request->get('Nombre');
        $relleno->Abreviatura=$request->get('Abreviatura');
        $relleno->Condicion='1';
        $relleno->save();
        return Redirect::to('almacen/relleno');
>>>>>>> 173bb7ffc094f04cc27d35538d39f23540eae0b1

    }
    public function show($id)
    {
<<<<<<< HEAD
        return view("administracion.relleno.show",["relleno"=>Relleno::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("administracion.relleno.edit",["relleno"=>Relleno::findOrFail($id)]);
=======
        return view("almacen.relleno.show",["relleno"=>Relleno::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("almacen.relleno.edit",["relleno"=>Relleno::findOrFail($id)]);
>>>>>>> 173bb7ffc094f04cc27d35538d39f23540eae0b1
    }
    public function update(RellenoFormRequest $request,$id)  // funcion para editar
    {
        $relleno=Relleno::findOrFail($id);
<<<<<<< HEAD
        $relleno->nombre=$request->get('Nombre');
        $relleno->abreviatura=$request->get('Abreviatura');
        $relleno->update();
        return Redirect::to('administracion/relleno');
=======
        $relleno->Nombre=$request->get('Nombre');
        $relleno->Abreviatura=$request->get('Abreviatura');
        $relleno->update();
        return Redirect::to('almacen/relleno');
>>>>>>> 173bb7ffc094f04cc27d35538d39f23540eae0b1
    }
    public function destroy($id)  // funcion para borrar
    {
        $relleno=Relleno::findOrFail($id);
<<<<<<< HEAD
        $relleno->condicion='0';
        $relleno->update();
        return Redirect::to('administracion/relleno');
    }

=======
        $relleno->Condicion='0';
        $relleno->update();
        return Redirect::to('almacen/relleno');
    }
>>>>>>> 173bb7ffc094f04cc27d35538d39f23540eae0b1
}
