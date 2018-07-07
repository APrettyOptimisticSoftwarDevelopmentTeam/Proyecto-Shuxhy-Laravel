<?php

namespace Shuxhy\Http\Controllers;

use Illuminate\Http\Request;

use Shuxhy\Http\Requests;
use Shuxhy\Forma;
use Illuminate\Support\Facades\Redirect;
use Shuxhy\Http\Requests\FormaFormRequest;
use DB;

class FormaController extends Controller
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
            $formas=DB::table('forma')->where('nombre','LIKE','%'.$query.'%')
            ->where ('condicion','=','1')
            ->orderBy('IdForma','desc')
            ->paginate(7);
            return view('administracion.forma.index',["formas"=>$formas,"searchText"=>$query]);
=======
            $formas=DB::table('forma')->where('Nombre','LIKE','%'.$query.'%')
            ->where ('Condicion','=','1')
            ->orderBy('IdForma','desc')
            ->paginate(7);
            return view('almacen.forma.index',["formas"=>$formas,"searchText"=>$query]);
>>>>>>> 173bb7ffc094f04cc27d35538d39f23540eae0b1
        }
    }
    public function create()
    {
<<<<<<< HEAD
        return view("administracion.forma.create");
=======
        return view("almacen.forma.create");
>>>>>>> 173bb7ffc094f04cc27d35538d39f23540eae0b1
    }
    public function store (FormaFormRequest $request)  // Funcion para crear 
    {
        $forma=new Forma;
<<<<<<< HEAD
        $forma->nombre=$request->get('Nombre');
        $forma->abreviatura=$request->get('Abreviatura');
        $forma->condicion='1';
        $forma->save();
        return Redirect::to('administracion/forma');
=======
        $forma->Nombre=$request->get('Nombre');
        $forma->Abreviatura=$request->get('Abreviatura');
        $forma->Condicion='1';
        $forma->save();
        return Redirect::to('almacen/forma');
>>>>>>> 173bb7ffc094f04cc27d35538d39f23540eae0b1

    }
    public function show($id)
    {
<<<<<<< HEAD
        return view("administracion.forma.show",["forma"=>Forma::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("administracion.forma.edit",["forma"=>Forma::findOrFail($id)]);
=======
        return view("almacen.forma.show",["forma"=>Forma::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("almacen.forma.edit",["forma"=>Forma::findOrFail($id)]);
>>>>>>> 173bb7ffc094f04cc27d35538d39f23540eae0b1
    }
    public function update(FormaFormRequest $request,$id)  // funcion para editar
    {
        $forma=Forma::findOrFail($id);
<<<<<<< HEAD
        $forma->nombre=$request->get('Nombre');
        $forma->abreviatura=$request->get('Abreviatura');
        $forma->update();
        return Redirect::to('administracion/forma');
=======
        $forma->Nombre=$request->get('Nombre');
        $forma->Abreviatura=$request->get('Abreviatura');
        $forma->update();
        return Redirect::to('almacen/forma');
>>>>>>> 173bb7ffc094f04cc27d35538d39f23540eae0b1
    }
    public function destroy($id)  // funcion para borrar
    {
        $forma=Forma::findOrFail($id);
<<<<<<< HEAD
        $forma->condicion='0';
        $forma->update();
        return Redirect::to('administracion/forma');
    }

=======
        $forma->Condicion='0';
        $forma->update();
        return Redirect::to('almacen/forma');
    }
>>>>>>> 173bb7ffc094f04cc27d35538d39f23540eae0b1
}
