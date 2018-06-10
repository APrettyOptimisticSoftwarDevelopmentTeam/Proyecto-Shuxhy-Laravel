@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Producto</h3>
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

			{!!Form::open(array('url'=>'almacen/producto','method'=>'POST','autocomplete'=>'off', 'files'=>'true'))!!}
            {{Form::token()}}

            <div class="row">
                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
            <div class="form-group">
                  <label for="Nombre">Nombre</label>
                  <input type="text" name="Nombre" class="form-control" placeholder="Nombre...">
            </div>

                  </div>

                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
            <div class="form-group">
                  <label for="Cantidad">Cantidad</label>
                  <input type="text" name="Cantidad" class="form-control" placeholder="Cantidad...">
            </div>      


                  </div>

                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                       
            <div class="form-group">
                  <label for="Descripción">Descripción</label>
                  <input type="text" name="Descripcion" class="form-control" placeholder="Descripción...">
            </div>


                  </div>

                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        

            <div class="form-group">
                  <label for="Precioporunidad">Precio por unidad</label>
                  <input type="text" name="Precioporunidad" class="form-control" placeholder="Precio por unidad...">
            </div>

                  </div>

                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
            <div class="form-group">
                  <label for="Unidad_entero">Unidad entera</label>
                  <input type="text" name="Unidad_entero" class="form-control" placeholder="Unidad entero...">
            </div>

                  </div>

                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                       
            <div class="form-group">
                  <label for="Unidad_medida">Unidad de medida</label>
                  <input type="text" name="Unidad_medida" class="form-control" placeholder="Unidad en medida...">
            </div>


                  </div>

                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
            <div class="form-group">
                  <label for="Unidad_Onzas">Unidad en onzas</label>
                  <input type="text" name="Unidad_Onzas" class="form-control" placeholder="Unidad en onzas...">
            </div>

                  </div>

                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                       
            <div class="form-group">
                  <label for="Imagen">Imagen</label>
                  <input type="file" name="Imagen" class="form-control">
            </div>

                  </div>


                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                       
            <div class="form-group">
                  <button class="btn btn-primary" type="submit">Guardar</button>
                  <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
                        
                  </div>


            </div>



            


			{!!Form::close()!!}		
            
	
@endsection