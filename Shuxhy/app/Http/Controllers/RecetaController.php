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
            ->select('r.IdReceta', 'r.CostoDeReposicion', 'r.CostoIndirecto', 'r.CostoManoDeObra', 'r.Descripcion', 'r.Equipo', 'r.Condicion', 'r.Nombre','r.Porcion',  'r.TiempoPreparacion', DB::raw('sum(dr.Cantidad*CostoMaterial) as total'))
            ->where('r.Nombre','LIKE','%'.$query.'%')
            ->where ('r.Condicion','=','1') 
            ->orderBy('r.IdReceta', 'desc')
            ->groupBy('r.IdReceta', 'r.CostoDeReposicion', 'r.CostoIndirecto', 'r.CostoManoDeObra', 'r.Descripcion', 'r.Equipo', 'r.Condicion', 'r.Nombre','r.Porcion', 'r.TiempoPreparacion')
            ->paginate(7);
            return view('almacen.receta.index',["recetas"=>$recetas,"searchText"=>$query]);

        }
    }


     public function create() // Lo que me falla debe de ser el script
    {
        
        $materiales=DB::table('material as mat')
        ->select(DB::raw('CONCAT(mat.Nombre, " ", mat.Descripcion ) AS material'),'mat.IdMaterial')
        ->where('mat.Condicion','=','1')
        ->get();


         $precios=DB::table('material as mat')
        ->select('mat.Costo AS precio')
        ->where('mat.Condicion','=','1')
        ->get(); 

        return view('almacen.receta.create',["materiales"=>$materiales, "precios"=>$precios]);
    }

    public function store (RecetaFormRequest $request)  // Funcion para crear 
    {

        try
        {

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
        //$receta->SubTotal=$request->get('SubTotal');
        $receta->Condicion='1';
        $receta->save();

        $IdMaterial = $request->get('IdMaterial');
        $Cantidad = $request->get('Cantidad');
        $CostoMaterial = $request->get('CostoMaterial');

        $cont=0;

        while ($cont < (count($IdMaterial))) 
        {
            $DetalleReceta = new DetalleReceta();
            $DetalleReceta->IdReceta=$receta->IdReceta;
            $DetalleReceta->IdMaterial=$IdMaterial[$cont];
            $DetalleReceta->Cantidad=$Cantidad[$cont];
            $DetalleReceta->CostoMaterial=$CostoMaterial[$cont];
            $DetalleReceta->save();
            $cont=$cont+1;



        }


            DB::commit();

        }catch(\Exception $e)
        {

           DB::rollback();

        }


        
        return Redirect::to('almacen/receta');

    }


    public function show($id) 
    {

        $receta=DB::table('receta as r')
            ->join('detallereceta as dr', 'r.IdReceta','=','dr.IdReceta')
            ->select('r.IdReceta', 'r.CostoDeReposicion', 'r.CostoIndirecto', 'r.CostoManoDeObra', 'r.Descripcion', 'r.Equipo', 'r.Condicion', 'r.Nombre','r.Porcion','r.TiempoPreparacion', DB::raw('sum(dr.Cantidad*CostoMaterial) as total'))
            ->where('r.IdReceta', '=', $id)
            ->first();

            $DetalleReceta=DB::table('detallereceta as dr')
            ->join('material as mat', 'dr.IdMaterial','=','mat.IdMaterial')
            ->select('mat.Nombre as material', 'dr.Cantidad', 'dr.CostoMaterial')
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
