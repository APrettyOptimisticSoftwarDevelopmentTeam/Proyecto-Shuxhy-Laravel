@extends ('layouts.admin')
@section ('contenido')
	<div class="row">

                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
            <div class="form-group">
                   <label for="Cliente">Nombre del combo</label>
                   <p>{{$combo->Nombre}}</p>
            
            </div>
                  </div>



                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
                       <div class="form-group">
                   <label for="Descripcion">Descripcion</label>
                   <p>{{$combo->Descripcion}}</p>
            
            </div>
                  </div>









</div>

<div class="row">

                  <div class="panel panel-primary">
                        <div class="panel-body">
                              
                              <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">

                                    <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">

                                          <thead style="background-color:pink">
                                               
                                                <th>Producto</th>
                                                <th>Cantidad</th>
                                                <th>Precio de unidad</th>
                                                <th>Subtotal</th>

                                          </thead>

                                          <tfoot>
                                               
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th><h4 id="total">{{$combo->total}}</h4></th>
                                                
                                          </tfoot>

                                          <tbody>
                                                @foreach ($DetalleCombo as $det)
                                                <tr>
                                                    <td>{{$det->producto}}</td>
                                                    <td>{{$det->Cantidad}}</td>
                                                    <td>{{$det->Precio}}</td>  
                                                    <td>{{$det->Cantidad*$det->Precio}}</td>
                                                </tr>
                                                @endforeach
                                          </tbody>
                                          
                                    </table>
                                          
                                    </div>

                              </div>
                              
                        </div>

                  </div>


            
		
@endsection