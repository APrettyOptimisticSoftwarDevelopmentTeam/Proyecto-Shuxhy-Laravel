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
            $formas=DB::table('forma')->where('Nombre','LIKE','%'.$query.'%')
            ->where ('Condicion','=','1')
            ->orderBy('IdForma','desc')
            ->paginate(7);
            return view('almacen.forma.index',["formas"=>$formas,"searchText"=>$query]);
        }
    }
    public function create()
    {
        return view("almacen.forma.create");
    }
    public function store (FormaFormRequest $request)  // Funcion para crear 
    {
        $forma=new Forma;
        $forma->Nombre=$request->get('Nombre');
        $forma->Abreviatura=$request->get('Abreviatura');
        $forma->Condicion='1';
        $forma->save();
        return Redirect::to('almacen/forma');

    }
    public function show($id)
    {
        return view("almacen.forma.show",["forma"=>Forma::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("almacen.forma.edit",["forma"=>Forma::findOrFail($id)]);
    }
    public function update(FormaFormRequest $request,$id)  // funcion para editar
    {
        $forma=Forma::findOrFail($id);
        $forma->Nombre=$request->get('Nombre');
        $forma->Abreviatura=$request->get('Abreviatura');
        $forma->update();
        return Redirect::to('almacen/forma');
    }
    public function destroy($id)  // funcion para borrar
    {
        $forma=Forma::findOrFail($id);
        $forma->Condicion='0';
        $forma->update();
        return Redirect::to('almacen/forma');
    }
}
