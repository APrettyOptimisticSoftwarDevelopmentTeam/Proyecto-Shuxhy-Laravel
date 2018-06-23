@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Materiales <a href="material/create"><button class="btn btn-success">Nuevo </button></a></h3>
		@include('almacen.material.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Nombre</th>
					<th>Descripción</th>
					<th>Costo</th>
					<th>PesoBase</th>
					<th>Unidad</th>
				</thead>
               @foreach ($materiales as $prod)
				<tr>  <!-- Aqui se establecen los datos  -->
					<td>{{ $mat->Nombre}}</td>		<!-- que se mostraran estos deben  -->
					<th>{{ $mat->Descripción}}</th>			<!-- de coincidir con el orden de arriba  -->
					<td>{{ $mat->Costo}}</td>		
					<td>{{ $mat->PesoBase}}</td>
					<td>{{ $mat->Unidad}}</td>
								
					
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