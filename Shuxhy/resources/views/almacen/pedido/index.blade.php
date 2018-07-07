@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Pedidos <a href="pedido/create"><button class="btn btn-success">Nuevo </button></a></h3>
		@include('almacen.pedido.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Nombre del cliente</th>
					<th>Entrega pedido</th>
					<th>Direccion de entrega</th>
					<th>Fecha</th>
					<th>Fecha de Entrega</th>
					<th>Comentario</th>
					<th>Total</th>
					<th>Opciones</th>
				</thead>
               @foreach($pedidos as $ped)
				<tr>  <!-- Aqui se establecen los datos  -->	<!-- que se mostraran estos deben  -->
					<td>{{ $ped->Nombre}}</td>
					<td>{{ $ped->EntregaPedido}}</td>		<!-- de coincidir con el orden de arriba  -->
					<td>{{ $ped->DireccionEntrega}}</td>
					<td>{{ $ped->FechaRealizado}}</td>
					<td>{{ $ped->FechaEntrega}}</td>
					<td>{{ $ped->Comentario}}</td>
					<td>{{ $ped->total}}</td>
					<td>
						<a href="{{URL::action('PedidoController@show',$ped->IdPedido)}}"><button class="btn btn-info">Detalles</button></a>
                         <a href="" data-target="#modal-delete-{{$ped->IdPedido}}" data-toggle="modal"><button class="btn btn-danger">Anular</button></a>
					</td>
				</tr>
				@include('almacen.pedido.modal')
				@endforeach
			</table>
		</div>
		{{$pedidos->render()}}
	</div>
</div>

@endsection