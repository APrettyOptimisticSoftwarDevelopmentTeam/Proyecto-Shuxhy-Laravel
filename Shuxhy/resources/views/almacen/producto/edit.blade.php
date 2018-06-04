@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Productos: {{ $producto->Nombre}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($producto,['method'=>'PATCH','route'=>['almacen.producto.update',$producto->idProducto]])!!}
            {{Form::token()}}
            <div class="form-group">
            	<label for="Nombre">Nombre</label>
            	<input type="text" name="Nombre" class="form-control" value="{{$producto->Nombre}}" placeholder="Nombre...">
            </div>

            <div class="form-group">
                  <label for="Cantidad">Cantidad</label>
                  <input type="text" name="Cantidad" class="form-control" value="{{$producto->Cantidad}}" placeholder="Cantidad...">
            </div>


            <div class="form-group">
            	<label for="Descripcion">Descripción</label>
            	<input type="text" name="Descripcion" class="form-control" value="{{$producto->Descripcion}}" placeholder="Descripción...">
            </div>

            

            <div class="form-group">
                  <label for="Precioporunidad">Precio por unidad</label>
                  <input type="text" name="Precioporunidad" class="form-control" value="{{$producto->Precioporunidad}}" placeholder="Precio por unidad...">
            </div>


            <div class="form-group">
                  <label for="Unidad_entero">Unidad entero</label>
                  <input type="text" name="Unidad_entero" class="form-control" value="{{$producto->Unidad_entero}}" placeholder="Unidad entero...">
            </div>

            <div class="form-group">
                  <label for="Unidad_medida">Unidad de medida</label>
                  <input type="text" name="Unidad_medida" class="form-control" value="{{$producto->Unidad_medida}}" placeholder="Unidad de medida...">
            </div>


            <div class="form-group">
                  <label for="Unidad_Onzas">Unidad en onzas</label>
                  <input type="text" name="Unidad_Onzas" class="form-control" value="{{$producto->Unidad_Onzas}}" placeholder="Unidad en onzas...">
            </div>

            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<button class="btn btn-danger" type="reset">Cancelar</button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection