@extends ('layouts.admin')
@section ('contenido')
	

			{!!Form::open(array('url'=>'reportes/ventas','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}

            <div class="row">


                  <div class="col-lg-5 col-sm-5 col-md-5 col-xs-12">
                        
      
       </div>        

                  <div class="col-lg-5 col-sm-5 col-md-5 col-xs-12">
                        
       
                  </div>



            


                  <div class="col-lg-5 col-sm-5 col-md-5 col-xs-12">
          



                  <div class="col-lg-5 col-sm-5 col-md-5 col-xs-12">
                        
            <div class="form-group">
                  <label for="Desde">Desde</label>
                  <input type="date" name="Desde" class="form-control" placeholder="Desde...">
            </div>  


               <div class="form-group">
                  <label for="Hasta">Hasta</label>
                  <input type="date" name="Hasta" class="form-control" placeholder="Hasta...">
            </div>  

                  </div>




</div>

<div class="row">


                              <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">

                                    <div class="form-group">
                                          <button type="submit" id="bt_add" class="btn btn-primary" type="submit">Generar</button>
                                          <button type="button" id="bt_add" class="btn btn-primary"><a href="{{url('reportes/ventas/displayreport')}}">Cancelar</a></button>
                                          
                                    </div>

                              </div>

                              <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">

                                    <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">

                                          <thead style="background-color:pink">
                                                <th>Desde</th>
                                                <th>Hasta</th>
                                              

                                          </thead>

                                          <tfoot>
                                                <th>Total</th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th><h4 id="total">RD$ . 00</h4><input type="hidden" name="Total" id="Total"></th>
                                                
                                          </tfoot>

                                          <tbody>
                                                
                                          </tbody>
                                          
                                    </table>
                                          
                                    </div>

                              </div>
                              
                        </div>

                  </div>


                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" id="generar">
                        
            
                        
                  </div>



            </div>



            
	
@endsection