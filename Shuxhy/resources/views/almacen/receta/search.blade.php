{!! Form::open(array('url'=>'almacen/receta','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}
<div class="form-group">
	<div class="input-group">
		<input type="text" class="form-control" name="searchText" placeholder="Buscar..." value="{{$searchText}}">
		<span class="input-group-btn">
			<button type="submit" class="fa fa-search">Buscar</button>
		</span>
	</div>
</div>

{{Form::close()}}