@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de combos <a href="combo/create"><button class="btn btn-success">Nuevo </button></a></h3>
		@include('almacen.combo.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Nombre</th>
					<th>Descripción</th>
					<th>Subtotal</th>
					<th>Descuento</th>
					<th>Total</th>
					<th>Imagen</th>
					<th>Opciones</th>
				</thead>
               @foreach ($combos as $combo)
				<tr>  <!-- Aqui se establecen los datos  -->
					<td>{{ $combo->Nombre}}</td>		<!-- que se mostraran estos deben  -->
					<td>{{ $combo->Descripcion}}</td>		<!-- de coincidir con el orden de arriba  -->
					<td>{{ $combo->Subtotal}}</td>
					<td>{{ $combo->Descuento}}</td>
					<td>{{ $combo->Total}}</td>
					
					<td>
						<img src="{{asset('imagenes/combos/'.$combo->Imagen)}}" alt="{{$combo->Nombre}}" height="100px" width="100px" class="img-thubnail">
					</td>
					<td>
						<a href="{{URL::action('ComboController@edit',$combo->IdCombo)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$combo->IdCombo}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('almacen.combo.modal')
				@endforeach
			</table>
		</div>
		{{$combos->render()}}
	</div>
</div>

@endsection