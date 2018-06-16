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
                  <label for="Descripción">Descripción</label>
                  <input type="text" name="Descripcion" class="form-control" placeholder="Descripción...">
            </div>


                  </div>

                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        

            <div class="form-group">
                  <label for="Precio">Precio</label>
                  <input type="text" name="Precio" class="form-control" placeholder="Precio...">
            </div>

                  </div>

                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
            <div class="form-group">
                  <label>Forma</label>
                  <select name ="IdForma" class="form-control">
                        @foreach ($formaspostres as $formas)
                        <option value ="{{$postre->IdForma}}">{{$formas->Nombre}}</option>
                        @endforeach
                  </select>
            </div>

                  </div>

                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                       
            <div class="form-group">
                  <label>Relleno</label>
                  <select name ="IdRelleno" class="form-control">
                        @foreach ($rellenopostre as $relleno)
                        <option value ="{{$rellenos->IdRelleno}}">{{$relleno->Nombre}}</option>
                        @endforeach
                  </select>
            </div>

</div>
                  

            <div class="form-group">
                  <label>Sabor</label>
                  <select name ="IdSabor" class="form-control">
                        @foreach ($SaborPostre as $sabor)
                        <option value ="{{$postre->IdPostre}}">{{$sabor->Nombre}}</option>
                        @endforeach
                  </select>
            </div>


<div class="form-group">
                  <label>Topping</label>
                  <select name ="IdTopping" class="form-control">
                        @foreach ($ToppingPostre as $topping)
                        <option value ="{{$topping->Idtopping}}">{{$topping->Nombre}}</option>
                        @endforeach
                  </select>
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
                  <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
                        
                  </div>


            </div>



            


			{!!Form::close()!!}		
            
	
@endsection