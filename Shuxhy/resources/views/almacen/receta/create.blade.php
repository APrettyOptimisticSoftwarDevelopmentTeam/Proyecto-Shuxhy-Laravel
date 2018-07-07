@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nueva Receta</h3>
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

			{!!Form::open(array('url'=>'almacen/receta','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}

            <div class="row"> 

                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
            <div class="form-group">
                  <label for="Nombre">Nombre de la receta</label>
                  <input type="text" name="Nombre" class="form-control" placeholder="Nombre de la receta...">
            </div>
                  </div>



                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
                       <div class="form-group">
                  <label for="Descripcion">Descripción</label>
                  <input type="text" name="Descripcion" class="form-control" placeholder="Descripción...">
            </div> 
                  </div>



                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
            <div class="form-group">
                  <label for="Equipo">Equipos usados</label>
                  <input type="text" name="Equipo" class="form-control"  placeholder="Equipos utilizados...">
            </div>

                  </div>



                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
            <div class="form-group">
                  <label for="TiempoPreparacion">Tiempo de preparacion</label>
                  <input type="text" name="TiempoPreparacion" class="form-control" placeholder="Tiempo de preparacion...">
            </div>  

                  </div>

                   <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
            <div class="form-group">
                  <label for="Porcion">Porcion</label>
                  <input type="number" name="Porcion" class="form-control" placeholder="Porcion...">
            </div>  

                  </div>

                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
            <div class="form-group">
                  <label for="CostoDeReposicion">Costo De Reposicion</label>
                  <input type="number" name="CostoDeReposicion" class="form-control" placeholder="Costo De Reposicion...">
            </div>  

                  </div>


                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
            <div class="form-group">
                  <label for="CostoIndirecto">Costo Indirecto</label>
                  <input type="number" name="CostoIndirecto" class="form-control" placeholder="Costo Indirecto...">
            </div>  

                  </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        
            <div class="form-group">
                  <label for="CostoManoDeObra">Costo Mano De Obra</label>
                  <input type="number" name="CostoManoDeObra" class="form-control" placeholder="Costo Mano De Obra...">
            </div>  

                  </div>


  </div>




                <div class="row">

                  <div class="panel panel-primary">
                        <div class="panel-body">
                              <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">

                                    <div class="form-group">
                                          <label>Material</label>
                                          <select name="pidmaterial" class="form-control selectpicker" id="pidmaterial" data-live-search="true">
                                                @foreach ($materiales as $material)
                                                <option value="{{$material->IdMaterial}}">{{$material->material}}</option>
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
                                          <label for="CostoMaterial">Costo por material</label>
                                          <input type="number" name="pcostomaterial" id="pcostomaterial" class="form-control" placeholder="Costo por material">
                                          
                                    </div>

                              </div>

                              <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

                                    <div class="form-group">
                                          <button type="button" id="bt_add" class="btn btn-primary">Agregar</button>
                                          
                                    </div>

                              </div>

                              <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">

                                    <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">

                                          <thead style="background-color:pink">
                                                <th>Opciones</th>
                                                <th>Material</th>
                                                <th>Cantidad</th>
                                                <th>Costo por material</th>
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
                  <button class="btn btn-danger"><a href="{{url('almacen/receta')}}">Cancelar</a></button>
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
                              IdMaterial=$("#pidpmaterial").val();
                              Material=$("#pidmaterial option:selected").text();
                              Cantidad=$("#pcantidad").val();
                              CostoMaterial=$("#pcostomaterial").val();

                              if (IdMaterial!="" && Cantidad!="" && Cantidad>0 && CostoMaterial!="") 
                              {
                                    subtotal[cont]=(Cantidad*CostoMaterial);
                                    total=total+subtotal[cont]; // todo bien hasta aqui

                                    var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="IdMaterial[]" value="'+IdMaterial+'">'+Material+'</td><td><input type="number" name="Cantidad[]" value="'+Cantidad+'"></td><td><input type="number" name="CostoMaterial[]" value="'+CostoMaterial+'"></td><td></td>'+subtotal[cont]+'</tr>';
                                    cont++;

                                    limpiar();
                                    $("#total").html("S/. " +total);
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
                              $("#mcantidad").val("");
                              $("#mcostomaterial").val("");
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