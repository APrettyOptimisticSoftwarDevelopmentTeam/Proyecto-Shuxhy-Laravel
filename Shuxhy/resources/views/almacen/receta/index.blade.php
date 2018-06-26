@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de recetas <a href="receta/create"><button class="btn btn-success">Nueva</button></a></h3>
		@include('almacen.receta.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Nombre de la receta</th>
					<th>Descripción</th>
					<th>Equipos utilizados</th>
					<th>Tiempo de preparacion</th>
					<th>Opciones</th>
				</thead>
               @foreach ($recetas as $rece)
				<tr>  <!-- Aqui se establecen los datos  -->
					<td>{{ $rece->NombreReceta}}</td>		<!-- que se mostraran estos deben  -->
							<!-- de coincidir con el orden de arriba  -->
					<td>{{ $rece->Descripcion}}</td>
					<td>{{ $rece->Equipos}}</td>
					<td>{{ $rece->TiempoPreparacion}}</td>
					
					<td>
						<a href="{{URL::action('RecetaController@edit',$rece->IdReceta)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$rece->IdReceta}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('almacen.receta.modal')
				@endforeach
			</table>
		</div>
		{{$recetas->render()}}
	</div>
</div>

@endsection