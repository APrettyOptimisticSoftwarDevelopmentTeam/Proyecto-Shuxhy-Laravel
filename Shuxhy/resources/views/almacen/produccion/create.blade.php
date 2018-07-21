@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nueva Produccion</h3>
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

			{!!Form::open(array('url'=>'almacen/produccion','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}

             <div class="row">
      
                  <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                        
            <div class="form-group">
                   <label>Estado de la produccion</label>
                  <select name="Estatus" class="form-control selectpicker" id="IdEstatus" data-live-search="true">
                        <option>En Proceso</option>
                        <option>Listo</option>
                  </select>
            </div>
                  </div>

                     <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                        
            <div class="form-group">
                               <label>Receta</label>
                       <select name="pidreceta" class="form-control selectpicker" id="pidreceta" data-live-search="true">
                             @foreach ($recetas as $receta)
                           <option value="{{$receta->IdReceta}}_{{$receta->Porcion}}">{{$receta->receta}}</option>
                           @endforeach

                          </select>
                      </div>
       </div>  


       <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">

                           <div class="form-group">
                              <label for="CantidadProducir">Cantidad a Producir</label>
                                <input type="number" disabled name="pcantidadproducir" id="pcantidadproducir" class="form-control" placeholder="Cantidad producir">
                                          
                             </div>

                              </div>





                                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">

                                    <div class="form-group">
                                          <label for="CantidadProducida">Cantidad Producida</label>
                                          <input type="number" name="pcantidadproducida" id="pcantidadproducida" class="form-control" placeholder="Cantidad Producida">
                                          
                                    </div>

                              </div>


                               <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">

                                    <div class="form-group">
                                          <label for="CantidadFaltante">Cantidad Faltante</label>
                                          <input type="number" name="pcantidadfaltante" id="pcantidadfaltante" class="form-control" placeholder="Cantidad Faltante">
                                          
                                    </div>

                              </div>



                  <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                        
            <div class="form-group">
                  <label for="Comentario">Comentario</label>
                  <input type="text" name="Comentario" class="form-control"  placeholder="Comentario...">
            </div>

                  </div>
                            



                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" id="guardar">
                        
            <div class="form-group">
                  <button class="btn btn-primary" type="submit">Guardar</button>
                  <button class="btn btn-danger"><a href="{{url('almacen/produccion')}}">Cancelar</a></button>
            </div>
                        
                  </div>


                   

  </div>


                             


            


            


                  {!!Form::close()!!}     

                  @push ('scripts') 
                  <script>
                        

                        $("#pidreceta").change(mostrarValores);
                        
                         function mostrarValores() 
                         {
                              datosRecetas=document.getElementById('pidreceta').value.split('_');
                               $("#pcantidadproducir").val(datosRecetas[1]);
                         }


                      

                    
                      
                  </script>
                  @endpush
            
      
@endsection