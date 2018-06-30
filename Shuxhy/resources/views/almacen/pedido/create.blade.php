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

                  <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                        
            <div class="form-group">
                  <label for="Nombre">Cliente</label>
                  <select name="IdCliente" id="IdCliente" class="form-control">
                        @foreach($clientes as $clientes)
                        <option value="{{$clientes->IdCliente}}">{{$cliente->Nombre}}</option>
                        @enforeach
  
                  </select>
                  
            </div>
                  </div>



                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
            <div class="form-group">
                   <label>Entrega del pedido</label>
                  <select name="Forma" class="form-control">
                        <option>En proceso</option>
                        <option>Solicitado</option>
                  </select>
            </div>
                  </div>



                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
                       <div class="form-group">
                  <label for="Comentario">Comentario</label>
                  <input type="text" name="Comentario" class="form-control" placeholder="Comentario...">
            </div> 
                  </div>



                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
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
                  <label for="FechaEntregado">Fecha entregado</label>
                  <input type="text" name="FechaEntregado" class="form-control" placeholder="Fecha de entrega...">
            </div>  

                  </div>




</div>

<div class="row">

                  <div class="panel panel-primary">
                        <div class="panel-body">
                              
                              <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                                    <div class="form-group">
                                          <label>Cliente</label>
                                          <select name="IdCliente" class="form-control" id="IdCliente">
                                                @foreach($clientes as $cliente)
                                                <option value="{{$cliente->IdCliente}}">{{$cliente->Cliente}}</option>
                                          </select>
                                    </div>
                              </div>
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