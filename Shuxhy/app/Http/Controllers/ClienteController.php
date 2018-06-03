<?php

namespace Shuxhy\Http\Controllers;

use Illuminate\Http\Request;

use Shuxhy\Http\Requests;
use Shuxhy\Cliente;
use Illuminate\Support\Facades\Redirect;
use Shuxhy\Http\Requests\CLienteFormRequest;
use DB;

class ClienteController extends Controller
{
    public function __construct()
    {

    }
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $clientes=DB::table('cliente')->where('nombre','LIKE','%'.$query.'%')
            ->where ('condicion','=','1')
            ->orderBy('IdCliente','desc')
            ->paginate(7);
            return view('almacen.cliente.index',["clientes"=>$clientes,"searchText"=>$query]);
        }
    }
    public function create()
    {
        return view("almacen.cliente.create");
    }
    public function store (ClienteFormRequest $request)
    {
        $cliente=new Cliente;
        $cliente->nombre=$request->get('Nombre');
        $cliente->apellido=$request->get('Apellido');
        $cliente->descripcion=$request->get('Descripcion');
        $cliente->direccion=$request->get('Direccion');
        $cliente->telefono=$request->get('Telefono');
        $cliente->fechaingreso=$request->get('FechaIngreso');
        $cliente->usuario=$request->get('Usuario');
        $cliente->condicion='1';
        $cliente->save();
        return Redirect::to('almacen/cliente');

    }
    public function show($id)
    {
        return view("almacen.cliente.show",["cliente"=>Cliente::findOrFail($id)]);
    }
    public function edit($id)
    {
        return view("almacen.cliente.edit",["cliente"=>Cliente::findOrFail($id)]);
    }
    public function update(ClienteFormRequest $request,$id)
    {
        $cliente=Cliente::findOrFail($id);
        $cliente->nombre=$request->get('Nombre');
        $cliente->apellido=$request->get('Apellido');
        $cliente->descripcion=$request->get('Descripcion');
        $cliente->direccion=$request->get('Direccion');
        $cliente->telefono=$request->get('Telefono');
        $cliente->fechaingreso=$request->get('FechaIngreso');
        $cliente->usuario=$request->get('Usuario');
        $cliente->update();
        return Redirect::to('almacen/cliente');
    }
    public function destroy($id)
    {
        $cliente=Cliente::findOrFail($id);
        $cliente->condicion='0';
        $cliente->update();
        return Redirect::to('almacen/cliente');
    }

}
