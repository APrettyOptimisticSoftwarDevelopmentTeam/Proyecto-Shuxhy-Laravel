@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Unidades <a href="unidad/create"><button class="btn btn-success">Nuevo </button></a></h3>
		@include('administracion.unidad.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Nombre</th>
					<th>Abreviatura</th>
					<th>Opciones</th>
				</thead>
               @foreach ($unidades as $uni)
				<tr>  <!-- Aqui se establecen los datos  -->
					<td>{{ $uni->NombreUnidad}}</td>		<!-- que se mostraran estos deben  -->
					<td>{{ $uni->Abreviatura}}</td>		<!-- de coincidir con el orden de arriba  -->
										
					<td>
						<a href="{{URL::action('UnidadController@edit',$uni->IdUnidad)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$uni->IdUnidad}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('administracion.unidad.modal')
				@endforeach
			</table>
		</div>
		{{$unidades->render()}}
	</div> 
</div>

@endsection