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
                   <p>{{$pedido->Comentario}}</p>
            
            </div>
                  </div>



                  <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                        
            <div class="form-group">
                  <label for="DireccionEntrega">Direccion de entrega</label>
                  <p>{{$pedido->DireccionEntrega}}</p>
            </div>

                  </div>



                  <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                        
            <div class="form-group">
                  <label for="FechaRealizado">Fecha realizado</label>
                  <p>{{$pedido->FechaRealizado}}</p>
            </div>  

                  </div>


                   <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                        
            <div class="form-group">
                  <label for="FechaEntrega">Fecha entregado</label>
                  <p>{{$pedido->FechaEntrega}}</p>
            </div>  

                  </div>




</div>

<div class="row">

                  <div class="panel panel-primary">
                        <div class="panel-body">
                              
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
                                                @foreach ($DetallePedido as $det)
                                                <tr>
                                                    <td>{{$det->producto}}</td>
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






            


            
            
	
@endsection