@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nueva Factura</h3>
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

			{!!Form::open(array('url'=>'almacen/factura','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}

            <div class="row">


                  <div class="col-lg-5 col-sm-5 col-md-5 col-xs-12">
                        
                                  
            <div class="form-group">
                   <label>Forma de Pago</label>
                  <select name="FormaPago" class="form-control selectpicker" id="IdFactura" data-live-search="true">
                        <option>Efectivo</option>
                        <option>Transferencia</option>
                  </select>
            </div>
                  </div>
                 

</div>

<div class="row">

                  <div class="panel panel-primary">
                        <div class="panel-body">
                              <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">

                                    <div class="form-group">
                                          <label>Producto</label>
                                          <select name="pidproducto" class="form-control selectpicker" id="pidproducto" data-live-search="true">
                                                @foreach ($productos as $producto)
                                                <option value="{{$producto->IdProducto}}_{{$producto->Precio}}">{{$producto->producto}}</option>
                                                @endforeach

                                          </select>
                                    </div>
                              </div>


                              <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">

                                    <div class="form-group">
                                          <label for="PrecioProd">Precio del producto</label>
                                          <input type="number" disabled name="pprecioprod" id="pprecioprod" class="form-control" placeholder="Precio del producto RD$">
                                          
                                    </div>

                              </div>

                                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">

                                    <div class="form-group">
                                          <label for="Cantidad">Cantidad</label>
                                          <input type="number" name="pcantidad" id="pcantidad" class="form-control" placeholder="Cantidad">
                                          
                                    </div>

                              </div>


                               <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">

                                    <div class="form-group">
                                          <label>Combo</label>
                                          <select name="pidcombo" class="form-control selectpicker" id="pidcombo" data-live-search="true">
                                                @foreach ($combos as $combo)
                                                <option value="{{$combo->IdCombo}}_{{$combo->Total}}">{{$combo->combo}}</option>
                                                @endforeach

                                          </select>
                                    </div>
                              </div>


                              <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">

                                    <div class="form-group">
                                          <label for="PrecioComb">Precio del combo</label>
                                          <input type="number" disabled name="ppreciocomb" id="ppreciocomb" class="form-control" placeholder="Precio del combo RD$">
                                          
                                    </div>

                              </div>



                              <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">

                                    <div class="form-group">
                                          <label for="CantidadCombo">Cantidad del combo</label>
                                          <input type="number" name="pcantidadcombo" id="pcantidadcombo" class="form-control" placeholder="Cantidad">
                                          
                                    </div>

                              </div>


                               <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

                                    <div class="form-group">
                                          <label>Pedido</label>
                                          <select name="pidpedido" class="form-control selectpicker" id="pidpedido" data-live-search="true">
                                                @foreach ($pedidos as $pedido)
                                                <option value="{{$pedido->IdPedido}}_{{$pedido->Total}}">{{$pedido->pedido}}</option>
                                                @endforeach

                                          </select>
                                    </div>
                              </div>



                              <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

                                    <div class="form-group">
                                          <label for="PrecioPed">Precio del pedido</label>
                                          <input type="number" disabled name="pprecioped" id="pprecioped" class="form-control" placeholder="Precio del pedido RD$">
                                          
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
                                                <th>Precio del producto</th>
                                                <th>Combo</th>
                                                <th>Cantidad de combos</th>
                                                <th>Precio del combo</th>
                                                <th>Pedido</th>
                                                <th>Precio del pedido</th>
                                                <th>Subtotal</th>

                                          </thead>

                                          <tfoot>
                                                <th>Total</th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th><h4 id="total">RD$/. 0.00</h4> <input type="hidden" name="TotalFacturado" id="TotalFacturado"></th>
                                                
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
                  <button class="btn btn-danger"><a href="{{url('almacen/factura')}}">Cancelar</a></button>
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
                        $("#pidproducto").change(mostrarValores);
                        $("#pidcombo").change(mostrarValores2);
                        $("#pidpedido").change(mostrarValores3);


                        function mostrarValores()
                        {
                              datosProducto=document.getElementById('pidproducto').value.split('_');
                              $("#pprecioprod").val(datosProducto[1]);
                        }


                        function mostrarValores2() 
                         {
                              datosCombos=document.getElementById('pidcombo').value.split('_');
                               $("#ppreciocomb").val(datosCombos[1]);
                         }


                         function mostrarValores3() 
                         {
                              datosPedidos=document.getElementById('pidpedido').value.split('_');
                               $("#pprecioped").val(datosPedidos[1]);
                         }

                        function agregar(argument) // funciona correctamente
                        {
                            
                            datosProducto=document.getElementById('pidproducto').value.split('_');
                              

                              IdProducto=datosProducto[0];
                              IdCombo=datosCombos[0];
                              IdPedido=datosPedidos[0];
                              Producto=$("#pidproducto option:selected").text();
                              Combo=$("#pidcombo option:selected").text();
                              Pedido=$("#pidpedido option:selected").text();
                              Cantidad=$("#pcantidad").val();
                              PrecioProd=$("#pprecioprod").val();
                              PrecioComb=$("#ppreciocomb").val();
                              PrecioPed=$("#pprecioped").val();
                              CantidadCombo=$("#pcantidadcombo").val();


                             if (Cantidad>0  && CantidadCombo>0 &&  IdCombo!="" &&  IdProducto!="" && PrecioComb>0  && PrecioProd>0) 
                              {
                                    subtotal[cont]=(Cantidad*parseInt(PrecioProd)+CantidadCombo*parseInt(PrecioComb)); 
                                    

                                    total=total+subtotal[cont]; // todo bien hasta aqui

                                    var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="IdProducto[]" value="'+IdProducto+'">'+Producto+'</td><td><input type="number" name="Cantidad[]" value="'+Cantidad+'"></td><td><input type="number" name="PrecioProd[]" value="'+PrecioProd+'"></td><td><input type="hidden" name="IdCombo[]" value="'+IdCombo+'">'+Combo+'</td><td><input type="number" name="CantidadCombo[]" value="'+CantidadCombo+'"></td><td><input type="number" name="PrecioComb[]" value="'+PrecioComb+'"></td><td>'+subtotal[cont]+'</td></tr>';
                                    cont++;

                                    limpiar();
                                    $("#total").html("RD$/. " +total);
                                    $("#TotalFacturado").val(total);
                                    evaluar();


                                    $("#detalles").append(fila);

                              }


                               if ( PrecioComb>0 && PrecioComb!=""  && IdProducto!="" && CantidadCombo!="" && CantidadCombo>0 && Cantidad=="") 
                              {
                                    subtotal[cont]=(CantidadCombo*parseInt(PrecioComb)); 

                                    total=total+subtotal[cont]; 

                                    var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="IdProducto[]" value="'+IdProducto+'">'+Producto+'</td><td><input type="hidden" name="Cantidad[]" value="'+Cantidad+'"></td><td><input type="hidden" name="PrecioProd[]" value="'+PrecioProd+'"></td><td><input type="hidden" name="IdCombo[]" value="'+IdCombo+'">'+Combo+'</td><td><input type="number" name="CantidadCombo[]" value="'+CantidadCombo+'"></td><td><input type="number" name="PrecioComb[]" value="'+PrecioComb+'"></td><td>'+subtotal[cont]+'</td></tr>';
                                    cont++;

                                    limpiar();
                                    $("#total").html("RD$/. " +total);
                                    $("#TotalFacturado").val(total);
                                    evaluar();


                                    $("#detalles").append(fila);

                              }

                              if (PrecioProd>0  && Cantidad>0 && IdProducto!="") //error en algunas condiciones
                              {
                                    subtotal[cont]=(Cantidad*parseInt(PrecioProd)); 

                                    total=total+subtotal[cont]; // todo bien hasta aqui

                                    var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="IdProducto[]" value="'+IdProducto+'">'+Producto+'</td><td><input type="number" name="Cantidad[]" value="'+Cantidad+'"></td><td><input type="number" name="PrecioProd[]" value="'+PrecioProd+'"></td><td><input type="hidden" name="IdCombo[]" value="'+IdCombo+'">'+Combo+'</td><td><input type="hidden" name="CantidadCombo[]" value="'+CantidadCombo+'"></td><td><input type="hidden" name="PrecioComb[]" value="'+PrecioComb+'"></td><td>'+subtotal[cont]+'</td></tr>';
                                    cont++;

                                    limpiar();
                                    $("#total").html("RD$/. " +total);
                                    $("#TotalFacturado").val(total);
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
                              $("#pcantidadcombo").val("");
                              $("#TotalFacturado").val(total);
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
                              $("#total").html("RD$/. " +total);
                              $("#TotalFacturado").val(total);
                              $("#fila" + index).remove();
                              evaluar(); 

                        }
                    
                      
                  </script>
                  @endpush
            
	
@endsection