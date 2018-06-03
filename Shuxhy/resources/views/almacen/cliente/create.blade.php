@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Cliente</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::open(array('url'=>'almacen/cliente','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
            <div class="form-group">
            	<label for="Nombre">Nombre</label>
            	<input type="text" name="Nombre" class="form-control" placeholder="Nombre...">
            </div>


            <div class="form-group">
                  <label for="Apellido">Apellido</label>
                  <input type="text" name="Apellido" class="form-control" placeholder="Apellido...">
            </div>       

            <div class="form-group">
            	<label for="Descripción">Descripción</label>
            	<input type="text" name="Descripcion" class="form-control" placeholder="Descripción...">
            </div>


            <div class="form-group">
                  <label for="Direccion">Direccion</label>
                  <input type="text" name="Direccion" class="form-control" placeholder="Direccion...">
            </div>


            <div class="form-group">
                  <label for="Telefono">Telefono</label>
                  <input type="text" name="Telefono" class="form-control" placeholder="Telefono...">
            </div>
            

            <div class="form-group">
                  <label for="FechaIngreso">FechaIngreso</label>
                  <input type="text" name="FechaIngreso" class="form-control" placeholder="Fecha de ingreso...">
            </div>


            <div class="form-group">
                  <label for="Usuario">Usuario</label>
                  <input type="text" name="Usuario" class="form-control" placeholder="Usuario de Instagram...">
            </div>

            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection