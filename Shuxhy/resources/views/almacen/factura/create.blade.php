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
                              <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">

                                    <div class="form-group">
                                          <label>Producto</label>
                                          <select name="pidproducto" class="form-control selectpicker" id="pidproducto" data-live-search="true">
                                                @foreach ($productos as $producto)
                                                <option value="{{$producto->IdProducto}}_{{$producto->Precio}}">{{$producto->producto}}</option>
                                                @endforeach

                                          </select>
                                    </div>
                              </div>


                              <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">

                                    <div class="form-group">
                                          <label for="Precio">Precio</label>
                                          <input type="number" disable name="pprecio" id="pprecio" class="form-control" placeholder="Precio">
                                          
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
                        Subtotal=[];
                        $("#guardar").hide();
                        $("#pidproducto").change(mostrarValores);


                        function mostrarValores()
                        {
                              datosProducto=document.getElementById('pidproducto').value.split('_');
                              $("#pprecio").val(datosProducto[1]);
                        }

                        function agregar(argument) // funciona correctamente
                        {
                             datosProducto=document.getElementById('pidproducto').value.split('_');
                              

                              IdProducto=datosProducto[0];
                              Producto=$("#pidproducto option:selected").text();
                              Cantidad=$("#pcantidad").val();
                              Precio=$("#pprecio").val();

                              if (IdProducto!="" && Cantidad!="" && Cantidad>0 && Precio!="") 
                              {
                                    Subtotal[cont]=(Cantidad*Precio);
                                    total=total+Subtotal[cont]; // todo bien hasta aqui

                                    var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="IdProducto[]" value="'+IdProducto+'">'+Producto+'</td><td><input type="number" name="Cantidad[]" value="'+Cantidad+'"></td><td><input type="number" name="Precio[]" value="'+Precio+'"></td><td></td>'+Subtotal[cont]+'</tr>';
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
                              $("#pprecio").val("");
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
                              total=total-Subtotal[index];
                              $("#total").html("RD$/. " +total);
                              $("#fila" + index).remove();
                              evaluar(); 

                        }
                    
                      
                  </script>
                  @endpush
            
	
@endsection