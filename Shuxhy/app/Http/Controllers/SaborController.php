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
<<<<<<< HEAD
            $sabores=DB::table('sabor')->where('nombre','LIKE','%'.$query.'%')
            ->where ('condicion','=','1')
            ->orderBy('IdSabor','desc')
            ->paginate(7);
            return view('administracion.sabor.index',["sabores"=>$sabores,"searchText"=>$query]);
=======
            $sabores=DB::table('sabor')->where('Nombre','LIKE','%'.$query.'%')
            ->where ('Condicion','=','1')
            ->orderBy('IdsSabor','desc')
            ->paginate(7);
            return view('almacen.sabor.index',["sabores"=>$sabores,"searchText"=>$query]);
>>>>>>> 173bb7ffc094f04cc27d35538d39f23540eae0b1
        }
    }
    public function create()
    {
<<<<<<< HEAD
        return view("administracion.sabor.create");
=======
        return view("almacen.sabor.create");
>>>>>>> 173bb7ffc094f04cc27d35538d39f23540eae0b1
    }
    public function store (SaborFormRequest $request)  // Funcion para crear 
    {
        $sabor=new Sabor;
<<<<<<< HEAD
        $sabor->nombre=$request->get('Nombre');
        $sabor->abreviatura=$request->get('Abreviatura');
        $sabor->condicion='1';
        $sabor->save();
        return Redirect::to('administracion/sabor');
=======
        $sabor->Nombre=$request->get('Nombre');
        $sabor->Abreviatura=$request->get('Abreviatura');
        $sabor->Condicion='1';
        $sabor->save();
        return Redirect::to('almacen/sabor');
>>>>>>> 173bb7ffc094f04cc27d35538d39f23540eae0b1

    }
    public function show($id)
    {
<<<<<<< HEAD
        return view("administracion.sabor.show",["sabor"=>Sabor::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("administracion.sabor.edit",["sabor"=>Sabor::findOrFail($id)]);
=======
        return view("almacen.sabor.show",["sabor"=>Sabor::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("almacen.sabor.edit",["sabor"=>Sabor::findOrFail($id)]);
>>>>>>> 173bb7ffc094f04cc27d35538d39f23540eae0b1
    }
    public function update(SaborFormRequest $request,$id)  // funcion para editar
    {
        $sabor=Sabor::findOrFail($id);
<<<<<<< HEAD
        $sabor->nombre=$request->get('Nombre');
        $sabor->abreviatura=$request->get('Abreviatura');
        $sabor->update();
        return Redirect::to('administracion/sabor');
=======
        $sabor->Nombre=$request->get('Nombre');
        $sabor->Abreviatura=$request->get('Abreviatura');
        $sabor->update();
        return Redirect::to('almacen/sabor');
>>>>>>> 173bb7ffc094f04cc27d35538d39f23540eae0b1
    }
    public function destroy($id)  // funcion para borrar
    {
        $sabor=Sabor::findOrFail($id);
<<<<<<< HEAD
        $sabor->condicion='0';
        $sabor->update();
        return Redirect::to('administracion/sabor');
    }

=======
        $sabor->Condicion='0';
        $sabor->update();
        return Redirect::to('almacen/sabor');
    }
>>>>>>> 173bb7ffc094f04cc27d35538d39f23540eae0b1
}
