@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de producciones <a href="produccion/create"><icon class="fa fa-plus" style="font-size:20px; color:green"></i></a></h3>
		@include('almacen.produccion.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Fecha</th>
					<th>Estatus</th>
					<th>Pedido</th>
					<th>Comentario</th>
					<th>Opciones</th>
				</thead>
               @foreach ($producciones as $prod)
				<tr>  <!-- Aqui se establecen los datos  -->
					<td>{{ $prod->Fecha}}</td>		<!-- que se mostraran estos deben  -->
							<!-- de coincidir con el orden de arriba  -->
					<td>{{ $prod->Estatus}}</td>
					<td>{{ $prod->Equipo}}</td>
					<td>{{ $prod->Pedido}}</td>
					<td>{{ $prod->Comentario}}</td>
					
					
					<td>
						<a href="{{URL::action('ProduccionController@show',$prod->IdProduccion)}}"><i class="fa fa-eye" style="font-size:20px"></i></a>
                         <a href="" data-target="#modal-delete-{{$prod->IdProduccion}}" data-toggle="modal"><i class="fa fa-remove" style="font-size:20px; color:red"></i></a>
					</td>
				</tr>
				@include('almacen.produccion.modal')
				@endforeach
			</table>
		</div>
		{{$producciones->render()}}
	</div>
</div>

@endsection