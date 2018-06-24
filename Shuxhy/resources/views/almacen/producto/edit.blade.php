@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Productos: {{ $producto->Nombre}}</h3>
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

			{!!Form::model($producto,['method'=>'PATCH','route'=>['almacen.producto.update',$producto->IdProducto],'files'=>'true'])!!}
            {{Form::token()}}

            <div class="row"> 

                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
            <div class="form-group">
                  <label for="Nombre">Nombre</label>
                  <input type="text" name="Nombre" class="form-control" value="{{$producto->Nombre}}" placeholder="Nombre...">
            </div>
                  </div>



                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
            <div class="form-group">
                  <label for="CostoProduccion">Costo de produccion</label>
                  <input type="text" name="CostoProduccion" class="form-control" value="{{$producto->CostoProduccion}}" placeholder="Costo de produccion...">
            </div>
                  </div>



                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
                       <div class="form-group">
                  <label for="Descripcion">Descripción</label>
                  <input type="text" name="Descripcion" class="form-control" value="{{$producto->Descripcion}}" placeholder="Descripción...">
            </div> 
                  </div>



                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
            <div class="form-group">
                  <label for="Precio">Precio</label>
                  <input type="text" name="Precio" class="form-control" value="{{$producto->Precio}}" placeholder="Precio...">
            </div>

                  </div>



                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
            <div class="form-group">
                  <label for="Unidad">Unidad</label>
                  <input type="text" name="Unidad" class="form-control" value="{{$producto->Unidad}}" placeholder="Unidad...">
            </div>  

                  </div>


                   <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
            <div class="form-group">
                  <label for="Peso">Peso</label>
                  <input type="text" name="Peso" class="form-control" value="{{$producto->Peso}}" placeholder="Peso...">
            </div>  

                  </div>





                 <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
            <div class="form-group">
                  <label>Forma</label>
                  <select name="Forma" class="form-control selectpicker" id="Forma" data-live-search="true">
                        <option>Circulo</option>
                        <option>Cuadrado</option>
                        <option>Triangulo</option>
                        <option>Estrella</option>
                  </select>
            </div>


                  </div>



                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
            <div class="form-group">
                  <label>Relleno</label>
                  <select name="Relleno" class="form-control selectpicker" id="Relleno" data-live-search="true">
                        <option>Chocolate</option>
                        <option>Dulce de leche</option>
                        <option>Caramelo</option>
                        <option>Fresa</option>
                  </select>
            </div>


                  </div>



                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
            <div class="form-group">
                   <label>Sabor</label>
                  <select name="Sabor" class="form-control selectpicker" id="Sabor" data-live-search="true">
                        <option>Chocolate</option>
                        <option>Limon</option>
                        <option>Caramelo</option>
                        <option>Fresa</option>
                  </select>
            </div>


                  </div>


                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
            <div class="form-group">
                  <label>Topping</label>
                  <select name="Topping" class="form-control selectpicker" id="Topping" data-live-search="true">
                        <option>M6M</option>
                        <option>Oreo</option>
                        <option>Fresas</option>
                        <option>Hershey's</option>
                  </select>
            </div>


                  </div>



                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
            <div class="form-group">
                  <label for="Imagen">Imagen</label>
                  <input type="file" name="Imagen" class="form-control">
                  @if (($producto->Imagen)!="")
                  <img src="{{asset('imagenes/productos/'.$producto->Imagen)}}" height="250px" width="400px">
                  @endif
            </div>

                  </div>


                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
            <div class="form-group">
                  <button class="btn btn-primary" type="submit">Guardar</button>
                  <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
                        
                  </div>



            </div>



			{!!Form::close()!!}		
            
		
@endsection