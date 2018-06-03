@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Clientes: {{ $cliente->Nombre}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($cliente,['method'=>'PATCH','route'=>['almacen.cliente.update',$cliente->IdCliente]])!!}
            {{Form::token()}}
            <div class="form-group">
            	<label for="Nombre">Nombre</label>
            	<input type="text" name="Nombre" class="form-control" value="{{$cliente->Nombre}}" placeholder="Nombre...">
            </div>

            <div class="form-group">
                  <label for="Apellido">Apellido</label>
                  <input type="text" name="Apellido" class="form-control" value="{{$cliente->Apellido}}" placeholder="Apellido...">
            </div>


            <div class="form-group">
            	<label for="Descripcion">Descripción</label>
            	<input type="text" name="Descripcion" class="form-control" value="{{$cliente->Descripcion}}" placeholder="Descripción...">
            </div>

            

            <div class="form-group">
                  <label for="Direccion">Direccion</label>
                  <input type="text" name="Direccion" class="form-control" value="{{$cliente->Direccion}}" placeholder="Direccion...">
            </div>


            <div class="form-group">
                  <label for="Telefono">Telefono</label>
                  <input type="text" name="Telefono" class="form-control" value="{{$cliente->Telefono}}" placeholder="Telefono...">
            </div>

            <div class="form-group">
                  <label for="FechaIngreso">Fecha de ingreso</label>
                  <input type="text" name="FechaIngreso" class="form-control" value="{{$cliente->FechaIngreso}}" placeholder="FechaIngreso...">
            </div>


            <div class="form-group">
                  <label for="Usuario">Usuario de Instagram</label>
                  <input type="text" name="Usuario" class="form-control" value="{{$cliente->Usuario}}" placeholder="Usuario...">
            </div>

            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection