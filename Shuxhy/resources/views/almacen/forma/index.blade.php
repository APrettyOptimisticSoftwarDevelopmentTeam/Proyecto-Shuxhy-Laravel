@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de formas <a href="forma/create"><button class="btn btn-success">Nuevo </button></a></h3>
		@include('almacen.forma.search')
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
               @foreach ($formas as $form)
				<tr>
					   <!-- Aqui se establecen los datos  -->
					<td>{{ $form->Nombre}}</td>		<!-- que se mostraran estos deben  -->
					<td>{{ $form->Abreviatura}}</td>		<!-- de coincidir con el orden de arriba  -->
					<td>
						<a href="{{URL::action('FormaController@edit',$form->IdForma)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$form->IdForma}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('almacen.forma.modal')
				@endforeach
			</table>
		</div>
		{{$formas->render()}}
	</div>
</div>

@endsection