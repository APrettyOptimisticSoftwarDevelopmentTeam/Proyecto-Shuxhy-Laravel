@extends ('layouts.admin') 
@section ('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de Articulos<a href="articulo/create"><button class="btn btn-success">Nuevo</button></a></h3>
			@include('almacen.articulo.search')
		</div>

		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-condensed table-hover">
						<thead>
							<th>Id</th>
							<th>Nombre</th>
							<th>Descripción</th>
							<th>Precio de venta</th>
							<th>Opciones</th>
						</thead>
						@foreach ($articulos as $art)
						<tr>
							<td>{{ $art->idArticulo}}</td>
							<td>{{ $art->nombre}}</td>
							<td>{{ $art->descripcion}}</td>
							<td>{{ $art->precioVenta}}</td>
					<td>
						<a href=""><button class="btn btn-info">Editar</button></a>
                         <a href=""><button class="btn btn-danger">Eliminar</button></a>
					</td>
						</tr>
						@endforeach
					</table>
				</div>
				{{$articulos->render()}}
			</div>
		</div>
		
@endsection