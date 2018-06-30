@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Producto</h3>
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

			{!!Form::open(array('url'=>'almacen/producto','method'=>'POST','autocomplete'=>'off', 'files'=>'true'))!!}
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
                  <label for="CostoProduccion">Costo de produccion</label>
                  <input type="text" name="CostoProduccion" class="form-control" placeholder="Costo de produccion...">
            </div>
                  </div>



                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
                       <div class="form-group">
                  <label for="Descripcion">Descripción</label>
                  <input type="text" name="Descripcion" class="form-control" placeholder="Descripción...">
            </div> 
                  </div>



                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
            <div class="form-group">
                  <label for="Precio">Precio</label>
                  <input type="text" name="Precio" class="form-control"  placeholder="Precio...">
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
                  <label for="Peso">Peso</label>
                  <input type="text" name="Peso" class="form-control" placeholder="Peso...">
            </div>  

                  </div>




                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
            <div class="form-group">
                  <label>Forma</label>
                  <select name="Forma" class="form-control selectpicker" id="Forma" data-live-search="true">
                        <option value="No aplica">No aplica</option>
                        <option value="Circulo">Circulo</option>
                        <option value="Cuadrado">Cuadrado</option>
                        <option value="Triangulo">Triangulo</option>
                        <option value="Estrella">Estrella</option>
                        <option value="Letra">Letra</option>
                  </select>
            </div>


                  </div>



                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
            <div class="form-group">
                  <label>Relleno</label>
                  <select name="Relleno" class="form-control selectpicker" id="Relleno" data-live-search="true">
                        <option>No aplica</option>
                        <option>Chocolate</option>
                        <option>Dulce de leche</option>
                        <option>Caramelo</option>
                        <option>Fresa</option>
                        <option>Hershey's</option>
                  </select>
            </div>


                  </div>



                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
            <div class="form-group">
                   <label>Sabor</label>
                  <select name="Sabor" class="form-control selectpicker" id="Sabor" data-live-search="true">
                        <option>No aplica</option>
                        <option>Chocolate</option>
                        <option>Limon</option>
                        <option>Caramelo</option>
                        <option>Fresa</option>
                        <option>Chinola</option>
                  </select>
</div>

                  </div>


                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
            <div class="form-group">
                   <label>Topping</label>
                  <select name="Topping" class="form-control selectpicker" id="Topping" data-live-search="true">
                        <option>No aplica</option>
                        <option>M&M</option>
                        <option>Oreo</option>
                        <option>Fresas</option>
                        <option>Hershey's</option>
                        <option>Nutella</option>
                        <option>Chocolate</option>
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
                  <button class="btn btn-danger"><a href="{{url('almacen/producto')}}">Cancelar</a></button>
            </div>
                        
                  </div>



            </div>


            


			{!!Form::close()!!}		
            
	
@endsection