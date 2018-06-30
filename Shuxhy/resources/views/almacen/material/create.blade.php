@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Material</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif
            </div>
      </div>

			{!!Form::open(array('url'=>'almacen/material','method'=>'POST','autocomplete'=>'off', 'files'=>'true'))!!}
            {{Form::token()}}

            <div class="row"> 

                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
            <div class="form-group">
                  <label for="Nombre">Nombre</label>
                  <input type="text" name="Nombre" class="form-control" placeholder="Nombre...">
            </div>
                  </div>



                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
            <div class="form-group">
                  <label for="Descripcion">Descripción</label>
                  <input type="text" name="Descripcion" class="form-control" placeholder="Descripcion...">
            </div>
                  </div>



                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
                       <div class="form-group">
                  <label for="Costo">Costo</label>
                  <input type="text" name="Costo" class="form-control" placeholder="Costo...">
            </div> 
                  </div>



                   <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
            <div class="form-group">
                  <label for="Peso">Peso</label>
                  <input type="text" name="Peso" class="form-control"  placeholder="Peso...">
            </div>
     
                  </div>



                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
            <div class="form-group">
                  <label>Unidad</label>
                  <select name="Unidad" class="form-control selectpicker" id="Unidad" data-live-search="true">
                        <option value="Unidad">Unidad</option>
                        <option value="Docena">Docena</option>
                        <option value="Botella">Botella</option>
                        <option value="Libra">Libra</option>
                        <option value="Onza">Onza</option>
                        <option value="Costal">Costal</option>
                        <option value="Taza">Taza</option>
                        <option value="Cucharada">Cucharada</option>
                        <option value="Cucharadita">Cucharadita</option>
                        <option value="Tarro">Tarro</option>
                        <option value="Lata">Lata</option>
                  </select>
            </div>


                  </div>


                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
            <div class="form-group">
                  <label for="Imagen">Imagen</label>
                  <input type="file" name="Imagen" class="form-control">
            </div>

                  </div>


                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
            <div class="form-group">
                  <button class="btn btn-primary" type="submit">Guardar</button>
                  <button class="btn btn-danger"><a href="{{url('almacen/material')}}">Cancelar</a></button>
            </div>
                        
                 
            </div>

 </div>
            


			{!!Form::close()!!}		
            
	
@endsection