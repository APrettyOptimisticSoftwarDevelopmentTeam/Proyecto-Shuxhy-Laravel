@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Recetas: {{ $receta->Nombre}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

            </div>
      </div>

			{!!Form::model($receta,['method'=>'PATCH','route'=>['almacen.receta.update',$receta->Idreceta],'files'=>'true'])!!}
            {{Form::token()}}

            <div class="row"> 

                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
            <div class="form-group">
                  <label for="Nombre">Nombre</label>
                  <input type="text" name="Nombre" class="form-control" value="{{$receta->Nombre}}" placeholder="Nombre...">
            </div>
                  </div>



                 <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
                       <div class="form-group">
                  <label for="Descripcion">Descripción</label>
                  <input type="text" name="Descripcion" class="form-control" value="{{$receta->Descripcion}}" placeholder="Descripción...">
            </div> 
                  </div>

                   

                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
            <div class="form-group">
                  <label for="Equipo">Equipo usados</label>
                  <input type="text" name="Equipo" class="form-control" value="{{$receta->Equipo}}" placeholder="Equipos usados...">
            </div>

                  </div>


                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
            <div class="form-group">
                  <label for="Porcion">Porciones</label>
                  <input type="number" name="Porcion" class="form-control" value="{{$receta->Porcion}}" placeholder="Porcion...">
            </div>

                  </div>


                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
            <div class="form-group">
                  <label for="TiempoPreparacion">Tiempo de preparacion</label>
                  <input type="text" name="TiempoPreparacion" class="form-control" value="{{$receta->TiempoPreparacion}}" placeholder="Tiempo de preparacion...">
            </div>

                  </div>


                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
            <div class="form-group">
                  <label for="CostoDeReposicion">Costo de reposicion</label>
                  <input type="text" name="CostoDeReposicion" class="form-control" value="{{$receta->CostoDeReposicion}}" placeholder="Costo de reposicion...">
            </div>

                  </div>


                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
            <div class="form-group">
                  <label for="CostoIndirecto">Costo indirecto</label>
                  <input type="number" name="CostoIndirecto" class="form-control" value="{{$receta->CostoIndirecto}}" placeholder="Costo indirecto...">
            </div>

                  </div>


                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
            <div class="form-group">
                  <label for="CostoManoDeObra">Costo de mano de obra</label>
                  <input type="number" name="CostoManoDeObra" class="form-control" value="{{$receta->CostoManoDeObra}}" placeholder="Costo de mano de obra...">
            </div>

                  </div>


                   


                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
            <div class="form-group">
                   <label>Producto final</label>
                  <select name="IdProducto" class="form-control selectpicker" id="IdProducto" data-live-search="true">
                        @foreach ($producto as $pro)
                        @if($pro->IdProducto==$receta->IdProducto)
                        <option value="{{$pro->IdProducto}}" selected>{{$pro->producto}}</option>
                        @else
                        <option value="{{$pro->IdProducto}}">{{$pro->producto}}</option>
                        @endif
                        @endforeach
                  </select>
            </div>


                  </div>


                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
            <div class="form-group">
                   <label>Forma</label>
                  <select name="IdForma" class="form-control selectpicker" id="IdForma" data-live-search="true">
                        @foreach ($forma as $form)
                        @if($form->IdForma==$receta->IdForma)
                        <option value="{{$form->IdForma}}" selected>{{$form->Nombre}}</option>
                        @else
                        <option value="{{$form->IdForma}}">{{$form->Nombre}}</option>
                        @endif
                        @endforeach
                  </select>
            </div>


                  </div>



                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
            <div class="form-group">
                   <label>Relleno</label>
                  <select name="IdRelleno" class="form-control selectpicker" id="IdRelleno" data-live-search="true">
                        @foreach ($relleno as $rell)
                        @if($rell->IdRelleno==$receta->IdRelleno)
                        <option value="{{$rell->IdRelleno}}" selected>{{$rell->Nombre}}</option>
                        @else
                        <option value="{{$rell->IdRelleno}}">{{$rell->Nombre}}</option>
                        @endif
                        @endforeach
                  </select>
            </div>


                  </div>



                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
            <div class="form-group">
                   <label>Sabor</label>
                  <select name="IdSabor" class="form-control selectpicker" id="IdSabor" data-live-search="true">
                        @foreach ($sabor as $sab)
                        @if($sab->IdSabor==$receta->IdSabor)
                        <option value="{{$sab->IdSabor}}" selected>{{$sab->Nombre}}</option>
                        @else
                        <option value="{{$sab->IdSabor}}">{{$sab->Nombre}}</option>
                        @endif
                        @endforeach
                  </select>
            </div>

                  </div>


                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        

                  </div>


                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
            <div class="form-group">
                  <button class="btn btn-primary" type="submit">Guardar</button>
                  <button class="btn btn-danger"><a href="{{url('almacen/receta')}}">Cancelar</a></button>
            </div>
                        
                  </div>



            </div>



			{!!Form::close()!!}		
            
		
@endsection