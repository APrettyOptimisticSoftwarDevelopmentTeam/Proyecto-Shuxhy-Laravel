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
					<th>Descripción</th>
					<th>Apellido</th>
					<th>Opciones</th>
				</thead>
               @foreach ($clientes as $clien)
				<tr>
					<td>{{ $clien->Idcliente}}</td>
					<td>{{ $clien->Nombre}}</td>
					<td>{{ $clien->Descripcion}}</td>
					<td>{{ $clien->Apellido}}</td>
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