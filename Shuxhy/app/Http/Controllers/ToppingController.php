<?php

namespace Shuxhy\Http\Controllers;

use Illuminate\Http\Request;

use Shuxhy\Http\Requests;
use Shuxhy\Topping;
use Illuminate\Support\Facades\Redirect;
use Shuxhy\Http\Requests\ToppingFormRequest;
use DB;

class ToppingController extends Controller
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
            $toppings=DB::table('topping')->where('Nombre','LIKE','%'.$query.'%')
            ->where ('Condicion','=','1')
            ->orderBy('IdTopping','desc')
            ->paginate(7);
            return view('almacen.topping.index',["toppings"=>$toppings,"searchText"=>$query]);
        }
    }
    public function create()
    {
        return view("almacen.topping.create");
    }
    public function store (toppingFormRequest $request)  // Funcion para crear 
    {
        $topping=new Topping;
        $topping->Nombre=$request->get('Nombre');
        $topping->Abreviatura=$request->get('Abreviatura');
        $topping->Condicion='1';
        $topping->save();
        return Redirect::to('almacen/topping');

    }
    public function show($id)
    {
        return view("almacen.topping.show",["topping"=>Topping::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("almacen.topping.edit",["topping"=>Topping::findOrFail($id)]);
    }
    public function update(ToppingFormRequest $request,$id)  // funcion para editar
    {
        $topping=Topping::findOrFail($id);
        $topping->Nombre=$request->get('Nombre');
        $topping->Abreviatura=$request->get('Abreviatura');
        $topping->update();
        return Redirect::to('almacen/topping');
    }
    public function destroy($id)  // funcion para borrar
    {
        $topping=Topping::findOrFail($id);
        $topping->Condicion='0';
        $topping->update();
        return Redirect::to('almacen/topping');
    }
}
