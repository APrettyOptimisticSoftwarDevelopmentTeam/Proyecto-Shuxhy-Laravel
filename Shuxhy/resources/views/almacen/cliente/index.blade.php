@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Clientes <a href="cliente/create"><button class="btn btn-success">Nuevo </button></a></h3>
		@include('almacen.cliente.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Descripción</th>
					<th>Direccion</th>
					<th>Telefono</th>
					<th>Fecha de ingreso</th>
					<th>Usuario de Instagram</th>
					<th>Opciones</th>
				</thead>
               @foreach ($clientes as $clien)
				<tr>
					<td>{{ $clien->IdCliente}}</td>   <!-- Aqui se establecen los datos  -->
					<td>{{ $clien->Nombre}}</td>		<!-- que se mostraran estos deben  -->
					<td>{{ $clien->Apellido}}</td>		<!-- de coincidir con el orden de arriba  -->
					<td>{{ $clien->Descripcion}}</td>
					<td>{{ $clien->Direccion}}</td>
					<td>{{ $clien->Telefono}}</td>
					<td>{{ $clien->FechaIngreso}}</td>
					<td>{{ $clien->Usuario}}</td>
					<td>
						<a href="{{URL::action('ClienteController@edit',$clien->IdCliente)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$clien->IdCliente}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('almacen.cliente.modal')
				@endforeach
			</table>
		</div>
		{{$clientes->render()}}
	</div>
</div>

@endsection