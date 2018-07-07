@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Pedido</h3>
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

			{!!Form::open(array('url'=>'almacen/pedido','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}

            <div class="row">


                  <div class="col-lg-5 col-sm-5 col-md-5 col-xs-12">
                        
            <div class="form-group">
                   <label for="Cliente">Cliente</label>
                  <select name="IdCliente" class="form-control selectpicker" id="IdCliente" data-live-search="true">
                        @foreach ($clientes as $cliente)
                        <option value="{{$cliente->IdCliente}}">{{$cliente->cliente}}</option>
                        @endforeach
                  </select>
            </div>
       </div>        

                  <div class="col-lg-5 col-sm-5 col-md-5 col-xs-12">
                        
            <div class="form-group">
                   <label>Estado del pedido</label>
                  <select name="EntregaPedido" class="form-control">
                        <option>En proceso</option>
                        <option>Entregado</option>
                        <option>Solicitado</option>
                  </select>
            </div>
                  </div>



                  <div class="col-lg-5 col-sm-5 col-md-5 col-xs-12">
                        
                       <div class="form-group">
                  <label for="Comentario">Comentario</label>
                  <input type="text" name="Comentario" class="form-control" placeholder="Comentario...">
            </div> 
                  </div>



                  <div class="col-lg-5 col-sm-5 col-md-5 col-xs-12">
                        
            <div class="form-group">
                  <label for="DireccionEntrega">Direccion de entrega</label>
                  <input type="text" name="DireccionEntrega" class="form-control"  placeholder="Direccion de entrega...">
            </div>

                  </div>



                  <div class="col-lg-5 col-sm-5 col-md-5 col-xs-12">
                        
            <div class="form-group">
                  <label for="FechaRealizado">Fecha Pedido</label>
                  <input type="text" name="FechaRealizado" class="form-control" placeholder="Fecha Realizado...">
            </div>  

                  </div>


                   <div class="col-lg-5 col-sm-5 col-md-5 col-xs-12">
                        
            <div class="form-group">
                  <label for="FechaEntrega">Fecha de Entrega</label>
                  <input type="text" name="FechaEntrega" class="form-control" placeholder="Fecha de entrega...">
            </div>  

                  </div>




</div>

<div class="row">

                  <div class="panel panel-primary">
                        <div class="panel-body">
                              <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">

                                    <div class="form-group">
                                          <label>Producto</label>
                                          <select name="pidproducto" class="form-control selectpicker" id="pidproducto" data-live-search="true">
                                                @foreach ($productos as $producto)
                                                <option value="{{$producto->IdProducto}}">{{$producto->producto}}</option>
                                                @endforeach

                                          </select>
                                    </div>
                              </div>


                              <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">

                                    <div class="form-group">
                                          <label>Precio</label>
                                          <select name="pprecioproducto" class="form-control selectpicker" id="pprecioproducto" data-live-search="true">
                                                @foreach ($precios as $precio)
                                                <option value="{{$precio->precio}}">{{$precio->precio}}</option>
                                                @endforeach

                                          </select>
                                    </div>

                              </div>

                                    <div class="col-lg-3 col-sm- col-md-6 col-xs-12">

                                    <div class="form-group">
                                          <label for="Cantidad">Cantidad</label>
                                          <input type="number" name="pcantidad" id="pcantidad" class="form-control" placeholder="Cantidad">
                                          
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
                                                <th>Producto</th>
                                                <th>Cantidad</th>
                                                <th>Precio por unidad</th>
                                                <th>Subtotal</th>

                                          </thead>

                                          <tfoot>
                                                <th>Total</th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th><h4 id="total">S/ . 00</h4></th>
                                                
                                          </tfoot>

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
                  <button class="btn btn-danger"><a href="{{url('almacen/pedido')}}">Cancelar</a></button>
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
                        total=0;
                        subtotal=[];
                        $("#guardar").hide();

                        function agregar(argument) // funciona correctamente
                        {
                              IdProducto=$("#pidproducto").val();
                              Producto=$("#pidproducto option:selected").text();
                              Cantidad=$("#pcantidad").val();
                              PrecioProducto=$("#pprecioproducto").val();

                              if (IdProducto!="" && Cantidad!="" && Cantidad>0 && PrecioProducto!="") 
                              {
                                    subtotal[cont]=(Cantidad*PrecioProducto);
                                    total=total+subtotal[cont]; // todo bien hasta aqui

                                    var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="IdProducto[]" value="'+IdProducto+'">'+Producto+'</td><td><input type="number" name="Cantidad[]" value="'+Cantidad+'"></td><td><input type="number" name="PrecioProducto[]" value="'+PrecioProducto+'"></td><td></td>'+subtotal[cont]+'</tr>';
                                    cont++;

                                    limpiar();
                                    $("#total").html("S/. " +total);
                                    evaluar();


                                    $("#detalles").append(fila);

                              }

                              else
                              {
                                    alert$("Error al ingresar el detalle del pedido, revise los datos del producto");
                              }

                        }
                        

                        function limpiar() //lista sin problemas
                        {
                              $("#pcantidad").val("");
                              $("#pprecioproducto").val("");
                        }

                        function evaluar() // funciona correctamente
                        {
                              if (total>0) 
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
                              total=total-subtotal[index];
                              $("#total").html("S/. " +total);
                              $("#fila" + index).remove();
                              evaluar(); 

                        }
                    
                      
                  </script>
                  @endpush
            
	
@endsection