@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Materiales <a href="material/create"><button class="btn btn-success">Nuevo</button></a></h3>
		@include('almacen.material.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Nombre</th>
					<th>Descripcion</th>
					<th>Costo</th>
					<th>Unidad</th>
					<th>Opciones</th>
				</thead>
               @foreach ($materiales as $mat)
				<tr>  <!-- Aqui se establecen los datos  -->
					<td>{{ $mat->Nombre}}</td>		<!-- que se mostraran estos deben  -->
					<th>{{ $mat->Descripcion}}</th>			<!-- de coincidir con el orden de arriba  -->
					<td>{{ $mat->Costo}}</td>		
					<td>{{ $mat->Unidad}}</td>

					<td>
						<img src="{{asset('imagenes/materiales/'.$mat->Imagen)}}" alt="{{ $mat->Nombre}}" height="100px" width="100px" class="img-thubnail">
					</td>

					<td>
						<a href="{{URL::action('MaterialController@edit',$mat->IdMaterial)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$mat->IdMaterial}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('almacen.material.modal')
				@endforeach
			</table>
		</div>
		{{$materiales->render()}}
	</div>
</div>

@endsection