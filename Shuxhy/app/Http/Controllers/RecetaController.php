<?php

namespace Shuxhy\Http\Controllers;

use Illuminate\Http\Request;

use Shuxhy\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input; // Para poder subir archivos e imagenes
use Shuxhy\Http\Requests\RecetaFormRequest;
use Shuxhy\Receta;
use Shuxhy\DetalleReceta;
use DB;

use Response; 
use Illuminate\Support\Collection;


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
            $recetas=DB::table('receta as r')
            ->join('detallereceta as dr', 'r.IdReceta','=','dr.IdReceta')
            ->select('r.IdReceta', 'r.CostoDeReposicion', 'r.CostoIndirecto', 'r.CostoManoDeObra', 'r.Descripcion', 'r.Equipo', 'r.Condicion', 'r.Nombre','r.Porcion',  'r.TiempoPreparacion', 'r.Total')
            ->where('r.Nombre','LIKE','%'.$query.'%')
            ->where ('r.Condicion','=','1') 
            ->orderBy('r.IdReceta', 'desc')
            ->groupBy('r.IdReceta', 'r.CostoDeReposicion', 'r.CostoIndirecto', 'r.CostoManoDeObra', 'r.Descripcion', 'r.Equipo', 'r.Condicion', 'r.Nombre','r.Porcion', 'r.TiempoPreparacion', 'r.Total')
            ->paginate(7);
            return view('almacen.receta.index',["recetas"=>$recetas,"searchText"=>$query]);

        }
    }


     public function create() 
    {
        
        $materiales=DB::table('material as mat')
        ->select(DB::raw('CONCAT(mat.Nombre, " ", mat.Descripcion ) AS material'),'mat.IdMaterial', 'mat.Costo')
        ->where('mat.Condicion','=','1')
        ->get();


        $unidades=DB::table('unidad as u')
        ->select( 'u.IdUnidad', 'u.NombreUnidad as unidad')
        ->where('Condicion','=','1')
        ->get();


         $productos=DB::table('producto as pro')
        ->select(DB::raw('CONCAT(pro.Nombre, " ", pro.Descripcion ) AS producto'),'pro.IdProducto')
        ->where('Condicion','=','1')
        ->get();


         

        return view('almacen.receta.create',["materiales"=>$materiales,"unidades"=>$unidades, "productos"=>$productos]);
    }

    public function store (RecetaFormRequest $request)  // Funcion para crear 
    {

      //  try
       // {

        DB::beginTransaction();
        $receta=new Receta;
        $receta->Nombre=$request->get('Nombre');
        $receta->TiempoPreparacion=$request->get('TiempoPreparacion');
        $receta->Porcion=$request->get('Porcion');
        $receta->Descripcion=$request->get('Descripcion');
        $receta->Equipo=$request->get('Equipo');
        $receta->CostoDeReposicion=$request->get('CostoDeReposicion');
        $receta->CostoIndirecto=$request->get('CostoIndirecto');
        $receta->CostoManoDeObra=$request->get('CostoManoDeObra');
        $receta->Total=$request->get('Total');
        $receta->IdProducto=$request->get('IdProducto');
        $receta->Condicion='1';
        $receta->save();

        $IdMaterial = $request->get('IdMaterial');
        $Cantidad = $request->get('Cantidad');
        $CostoMaterial = $request->get('CostoMaterial');
        $IdUnidad = $request->get('IdUnidad');

        $cont=0;

        while ($cont < (count($IdMaterial))) 
        {
            $DetalleReceta = new DetalleReceta();
            $DetalleReceta->IdReceta=$receta->IdReceta;
            $DetalleReceta->IdMaterial=$IdMaterial[$cont];
            $DetalleReceta->Cantidad=$Cantidad[$cont];
            $DetalleReceta->CostoMaterial=$CostoMaterial[$cont];
            $DetalleReceta->IdUnidad=$IdUnidad[$cont];
            $DetalleReceta->save();
            $cont=$cont+1;



        }


            DB::commit();

        //}catch(\Exception $e)
        //{

         //  DB::rollback();

        //}


        
        return Redirect::to('almacen/receta');

    }


    public function show($id) 
    {

        $receta=DB::table('receta as r')
            ->join('detallereceta as dr', 'r.IdReceta','=','dr.IdReceta')
            ->select('r.IdReceta', 'r.CostoDeReposicion', 'r.CostoIndirecto', 'r.CostoManoDeObra', 'r.Descripcion', 'r.Equipo', 'r.IdProducto','r.Condicion', 'r.Nombre','r.Porcion',  'r.TiempoPreparacion', 'r.Total')
            ->where('r.IdReceta', '=', $id)
            ->first();

            $DetalleReceta=DB::table('detallereceta as dr')
            ->join('material as mat', 'dr.IdMaterial','=','mat.IdMaterial')
            ->join('unidad as u', 'dr.IdUnidad','=','u.IdUnidad')
            ->select('mat.Nombre as material', 'dr.Cantidad', 'dr.CostoMaterial', 'u.NombreUnidad')
            ->where('dr.IdReceta', '=', $id)
            ->get();

        return view("almacen.receta.show",["receta"=>$receta,"DetalleReceta"=>$DetalleReceta]
        );
    }


    public function destroy($id)  // funcion para borrar
    {
        $receta=Receta::findOrFail($id);
        $receta->Condicion='0';
        $receta->update();
        return Redirect::to('almacen/receta');
    }


}
