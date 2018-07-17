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
      
                  <div class="col-lg-5 col-sm-5 col-md-5 col-xs-12">
                        
            <div class="form-group">
                   <label>Estado de la produccion</label>
                  <select name="Estatus" class="form-control selectpicker" id="IdEstatus" data-live-search="true">
                        <option>En Proceso</option>
                        <option>Listo</option>
                  </select>
            </div>
                  </div>

                     <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
            <div class="form-group">
                   <label for="IdPedido">Pedido</label>
                  <select name="IdPedido" class="form-control selectpicker" id="IdPedido" data-live-search="true">
                        @foreach ($pedidos as $pedido)
                        <option value="{{$pedido->IdPedido}}">{{$pedido->pedido}}</option>
                        @endforeach
                  </select>
            </div>
       </div>  


                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
            <div class="form-group">
                  <label for="Comentario">Comentario</label>
                  <input type="text" name="Comentario" class="form-control"  placeholder="Comentario...">
            </div>

                  </div>

                   

  </div>



                <div class="row">

                  <div class="panel panel-primary">
                        <div class="panel-body">
                              <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">

                                    <div class="form-group">
                                          <label>Receta</label>
                                          <select name="pidreceta" class="form-control selectpicker" id="pidreceta" data-live-search="true">
                                                @foreach ($recetas as $receta)
                                                <option value="{{$receta->IdReceta}}">{{$receta->receta}}</option>
                                                @endforeach

                                          </select>
                                    </div>
                              </div>

                              <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">

                                    <div class="form-group">
                                          <label for="CantidadProducir">Cantidad a Producir</label>
                                          <input type="number" name="pcantidadproducir" id="pcantidadproducir" class="form-control" placeholder="Cantidad a Producir">
                                          
                                    </div>

                              </div>

                                    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">

                                    <div class="form-group">
                                          <label for="CantidadProducida">Cantidad Producida</label>
                                          <input type="number" name="pcantidadproducida" id="pcantidadproducida" class="form-control" placeholder="Cantidad Producida">
                                          
                                    </div>

                              </div>


                               <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">

                                    <div class="form-group">
                                          <label for="CantidadFaltante">Cantidad Faltante</label>
                                          <input type="number" name="pcantidadfaltante" id="pcantidadfaltante" class="form-control" placeholder="Cantidad Faltante">
                                          
                                    </div>

                              </div>

                            
                              <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">

                                    <div class="form-group">
                                          <button type="button" id="bt_add" class="btn btn-primary">Agregar</button>
                                          
                                    </div>

                              </div>

                              <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">

                                    <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">

                                          <thead style="background-color:pink">
                                                <th>Opciones</th>
                                                <th>Receta</th>
                                                <th>Cantidad a Producir</th>
                                                <th>Cantidad Producida</th>
                                                <th>Cantidad Faltante</th>

                                          </thead>

                                          <tbody>
                                                
                                          </tbody>
                                          
                                    </table>
                                          
                                    </div>

                              </div>
                              
                        </div>

                  </div>


                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" id="guardar">
                        
            <div class="form-group">
                  <input  name="_token" value="{{ csrf_token() }}"  type="hidden"></input>
                  <button class="btn btn-primary" type="submit">Guardar</button>
                  <button class="btn btn-danger"><a href="{{url('almacen/produccion')}}">Cancelar</a></button>
            </div>
                        
                  </div>



            </div>


            


                  {!!Form::close()!!}     

                  @push ('scripts') 
                  <script>
                        $(document).ready(function(){ // funciona correctamente
                              $('#bt_add').click(function(){

                                    agregar();
                              });

                        });

                        var cont=0;
                       
                        $("#guardar").hide();

                        $("#pidreceta").change(mostrarValores);
                        
                         function mostrarValores() 
                         {
                              datosRecetas=document.getElementById('pidreceta').value.split('_');
                               
                         }


                        function agregar(argument) // funciona correctamente
                        {

                              datosRecetas=document.getElementById('pidreceta').value.split('_');
                               
                             
                              IdReceta=datosRecetas[0];
                              CantidadProducir=$("#pcantidadproducir").val();
                              CantidadProducida=$("#pcantidadproducida").val();
                              CantidadFaltante=$("#pcantidadfaltante").val();
                             
                              if (IdReceta!="" && CantidadProducir!="" && CantidadProducir>0 ) 

                              {


                                    var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="IdReceta[]" value="'+IdReceta+'">'+Receta+'</td><td><input type="number" name="CantidadProducir[]" value="'+CantidadProducir+'"></td><td><input type="number" name="CantidadProducida[]" value="'+CantidadProducida+'"></td><td><input type="hidden" name="CantidadFaltante[]" value="'+CantidadFaltante+'"</td></tr>';
                                    cont++;


                                    limpiar();


                                    evaluar();
                                    $("#detalles").append(fila);

                         }

                           

                              else
                              {
                                    alert$("Error al ingresar el detalle del receta, revise los datos del material");
                              }

                      
                        }
                        


                        function limpiar() //lista sin problemas
                        {
                              $("#pcantidadproducida").val("");
                              $("#pcantidadproducir").val("");
                              $("#pcantidadfaltante").val("");
                        }

                        function evaluar() // funciona correctamente
                        {
                              
                              if (CantidadProducir>0) 
                              {
                                    
                                     $("#guardar").show();
                              }
                               else
                              {
                                     $("#guardar").hide();
                              }
                        }

                        function eliminar(index) //funciona correctamente
                        {
                             
                              $("#fila" + index).remove();
                              evaluar(); 

                        }
                    
                      
                  </script>
                  @endpush
            
      
@endsection