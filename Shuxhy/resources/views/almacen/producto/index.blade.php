@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Productos <a href="producto/create"><button class="btn btn-success">Nuevo </button></a></h3>
		@include('almacen.producto.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Nombre</th>
					<th>Costo de produccion</th>
					<th>Descripción</th>
					<th>Precio</th>
					<th>Unidad</th>
					<th>Forma</th>
					<th>Sabor</th>
					<th>Relleno</th>
					<th>Topping</th>
					<th>Imagen</th>
					<th>Opciones</th>
				</thead>
               @foreach ($productos as $prod)
				<tr>  <!-- Aqui se establecen los datos  -->
					<td>{{ $prod->Nombre}}</td>		<!-- que se mostraran estos deben  -->
					<td>{{ $prod->CostoProduccion}}</td>		<!-- de coincidir con el orden de arriba  -->
					<td>{{ $prod->Descripcion}}</td>
					<td>{{ $prod->Precio}}</td>
					<td>{{ $prod->NombreUnidad}}</td>
					<td>{{ $prod->Forma}}</td>
					<td>{{ $prod->Sabor}}</td>
					<td>{{ $prod->Relleno}}</td>
					<td>{{ $prod->Topping}}</td>
					
					<td>
						<img src="{{asset('imagenes/productos/'.$prod->Imagen)}}" alt="{{ $prod->Nombre}}" height="100px" width="100px" class="img-thubnail">
					</td>
					<td>
						<a href="{{URL::action('ProductoController@edit',$prod->IdProducto)}}">  <i class="fa fa-edit" style="font-size:20px"></i></a>
                         <a href="" data-target="#modal-delete-{{$prod->IdProducto}}" data-toggle="modal"> <i class="fa fa-trash" style="font-size:18px;color:red"></i> </a>
					</td>
				</tr>
				@include('almacen.producto.modal')
				@endforeach
			</table>
		</div>
		{{$productos->render()}}
	</div>
</div>

@endsection