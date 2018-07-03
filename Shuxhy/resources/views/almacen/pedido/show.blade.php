@extends ('layouts.admin')
@section ('contenido')
	

		
            <div class="row">

                  <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                        
            <div class="form-group">
                   <label for="Cliente">Cliente</label>
                   <p>{{$pedido->Nombre}}</p>
            
            </div>
                  </div>



                  <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                        
                       <div class="form-group">
                  <label for="Comentario">Comentario</label>
                  <input type="text" name="Comentario" class="form-control" placeholder="Comentario...">
            </div> 
                  </div>



                  <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                        
            <div class="form-group">
                  <label for="DireccionEntrega">Direccion de entrega</label>
                  <input type="text" name="DireccionEntrega" class="form-control"  placeholder="Direccion de entrega...">
            </div>

                  </div>



                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
            <div class="form-group">
                  <label for="FechaRealizado">Fecha realizado</label>
                  <input type="text" name="FechaRealizado" class="form-control" placeholder="Fecha Realizado...">
            </div>  

                  </div>


                   <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
            <div class="form-group">
                  <label for="FechaEntrega">Fecha entregado</label>
                  <input type="text" name="FechaEntrega" class="form-control" placeholder="Fecha de entrega...">
            </div>  

                  </div>




</div>

<div class="row">

                  <div class="panel panel-primary">
                        <div class="panel-body">
                              <div class="col-lg-5 col-sm-5 col-md-5 col-xs-12">

                                    <div class="form-group">
                                          <label>Producto</label>
                                          <select name="pidproducto" class="form-control selectpicker" id="pidproducto" data-live-search="true">
                                                @foreach ($productos as $producto)
                                                <option value="{{$producto->IdProducto}}">{{$producto->producto}}</option>
                                                @endforeach

                                          </select>
                                    </div>

                                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

                                    <div class="form-group">
                                          <label for="Cantidad">Cantidad</label>
                                          <input type="number" name="pcantidad" id="pcantidad" class="form-control" placeholder="Cantidad">
                                          
                                    </div>

                              </div>

                              <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

                                    <div class="form-group">
                                          <label for="PrecioPorUnidad">Precio de unidad</label>
                                          <input type="number" name="pprecioporunidad" id="ppprecioporunidad" class="form-control" placeholder="Precio de unidad">
                                          
                                    </div>

                              </div>

                              <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

                                    <div class="form-group">
                                          <button type="button" id="bt_add" class="btn btn-primary">Agregar</button>
                                          
                                    </div>

                              </div>

                              <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">

                                    <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">

                                          <thead style="background-color:#A9D0F5">
                                               
                                                <th>Producto</th>
                                                <th>Cantidad</th>
                                                <th>Precio de unidad</th>
                                                <th>Subtotal</th>

                                          </thead>

                                          <tfoot>
                                               
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th><h4 id="total">{{$pedido->total}}</h4></th>
                                                
                                          </tfoot>

                                          <tbody>
                                                @foreach ($detalles as $det)
                                                <tr>
                                                    <td>{{$det->Producto}}</td>
                                                    <td>{{$det->Cantidad}}</td>
                                                    <td>{{$det->PrecioPorUnidad}}</td>  
                                                    <td>{{$det->Cantidad*$det->PrecioPorUnidad}}</td>
                                                </tr>
                                                @endforeach
                                          </tbody>
                                          
                                    </table>
                                          
                                    </div>

                              </div>
                              
                        </div>

                  </div>






            </div>


            
            
	
@endsection