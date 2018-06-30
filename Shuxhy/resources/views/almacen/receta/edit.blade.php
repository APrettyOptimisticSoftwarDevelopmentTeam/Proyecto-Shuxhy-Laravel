@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Recetas: {{ $receta->NombreReceta}}</h3>
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

			{!!Form::model($receta,['method'=>'PATCH','route'=>['almacen.receta.update',$receta->IdReceta]])!!}
            {{Form::token()}}

            <div class="row"> 

                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
            <div class="form-group">
                  <label for="NombreReceta">Nombre de la receta</label>
                  <input type="text" name="NombreReceta" class="form-control" value="{{$receta->NombreReceta}}" placeholder="Nombre de la receta...">
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
                  <label for="Equipos">Equipos utilizados</label>
                  <input type="text" name="Equipos" class="form-control" value="{{$receta->Equipos}}" placeholder="Equipos utilizados...">
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
                  <button class="btn btn-primary" type="submit">Guardar</button>
                  <button class="btn btn-danger"><a href="{{url('almacen/receta')}}">Cancelar</a></button>
            </div>
                        
                  </div>



            </div>



			{!!Form::close()!!}		
            
		
@endsection