<template>
	<div class="box box-success">
    <div class="box-header with-border">
              <h3 class="box-title">Iniciar una nueva consulta</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div><!-- /.box-tools -->
              <hr>
              <a class="btn btn-app">
                <i class="fa fa-address-book-o"></i>Datos
              </a>
              <a class="btn btn-app">
                <i class="fa fa-heartbeat"></i>Signos
              </a>
              <a class="btn btn-app">
                <i class="fa fa-user-md"></i>Inicial
              </a>
              <a class="btn btn-app">
                <i class="fa fa-medkit"></i>Plan
              </a>
              <a class="btn btn-app">
                <i class="fa fa-file-archive-o"></i>Pruebas
              </a>
              <a class="btn btn-app">
                <i class="fa fa-bed"></i>Diagnóstico
              </a>
              <a class="btn btn-app">
                <i class="fa fa-ambulance"></i>Referencias
              </a>
            </div><!-- /.box-header -->
    <!-- /.box-header -->
    <!-- form start -->
    <form class="form-horizontal" method="post">
      <div class="box-body">
      <pre>Datos Personales</pre>
        <div class="row" style="padding:2em;" v-if="personales">
          <div class="col-sm-3">
            <div class="form-group">
              <label>Cédula</label>
                  <input type="text" name="cedula" class="form-control" id="cedula" placeholder="Introduzca la cédula" required>    
              </div>
          </div>  
              <div class="col-sm-5 col-md-offset-1">
                <div class="form-group">
                <label>Nombre Completo</label>
                    <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Introduzca aquí el nombre del paciente">  
                </div>  
              </div>
            
              <div class="col-sm-2 col-md-offset-1">
                <div class="form-group">
                <label>Fecha de Nacimiento</label>
                    <input type="date" name="fecha_nac" class="form-control" id="nacimiento" placeholder="Introduzca aquí el número de cédula">  
                </div>  
              </div> 

            </div>
            <hr>
            <pre>Signos Vitales</pre>

            <div class="row" style="padding: 2em;">
              
              <div class="col-sm-2">
                <div class="form-group">
                    <label>Presion:</label>

                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-heart"></i>
                      </div>
                      <input type="text" class="form-control" data-inputmask="&quot;mask&quot;: &quot;9999-9999&quot;" data-mask="">
                    </div>
                    <!-- /.input group -->
                  </div> 
              </div>
            
              <div class="col-sm-2 col-sm-offset-1">
                <div class="form-group">
                    <label>Pulso:</label>

                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-heartbeat"></i>
                      </div>
                      <input type="text" class="form-control" data-inputmask="&quot;mask&quot;: &quot;9999-9999&quot;" data-mask="">
                    </div>
                    <!-- /.input group -->
                  </div> 
              </div>

              <div class="col-sm-2 col-md-offset-1">
                <div class="form-group">
                    <label>Temperatura:</label>

                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-thermometer-half"></i>
                      </div>
                      <input type="text" class="form-control" data-inputmask="&quot;mask&quot;: &quot;9999-9999&quot;" data-mask="">
                    </div>
                    <!-- /.input group -->
                  </div> 
              </div>

              <div class="col-sm-2 col-md-offset-1">
                <div class="form-group">
                    <label>Peso:</label>

                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-balance-scale"></i>
                      </div>
                      <input type="text" class="form-control" data-inputmask="&quot;mask&quot;: &quot;9999-9999&quot;" data-mask="">
                    </div>
                    <!-- /.input group -->
                  </div> 
              </div>

            </div>
            <hr>
            <pre>Diagnóstico Inicial</pre>
	        <div class="row" style="padding:2em;">
	          <div class="col-sm-5">
	            <div class="form-group">
	              <label>Síntomas: </label>
	                  <textarea class="form-control" rows="3"></textarea>    
	              </div>
	          </div>  
	              <div class="col-sm-5 col-sm-offset-1">
	            <div class="form-group">
	              <label>Observaciones: </label>
	                  <textarea class="form-control" rows="3"></textarea>    
	              </div>
	          </div> 
	            
	              <div class="col-sm-4">
	                <div class="form-group">
	                <label>Diagnóstico Inicial: </label>
	                    <input type="text" name="fecha_nac" class="form-control" id="nacimiento" placeholder="Introduzca aquí el diagnóstico inicial">  
	                </div>  
	              </div> 

	            </div>

		        <hr>
		        <pre>Plan</pre>
			    <div class="row" style="padding:2em;">
			       <div class="col-sm-5">
			          <div class="form-group">
			             <label>Tratamientos: </label>
			               <textarea class="form-control" rows="3"></textarea>    
			           </div>
			        </div>   
			           
			   	</div>

			   	<hr>
		        <pre>Pruebas diagnósticas</pre>
			    <div class="row" style="padding:2em;">
			       <div class="col-sm-5">
			          <div class="form-group">
			             <label>Laboratorio: </label>
			               <textarea class="form-control" rows="3"></textarea>    
			           </div>
			        </div>   
			        
			        <div class="col-sm-5 col-md-offset-1">
			          <div class="form-group">
			             <label>Rayos X: </label>
			               <textarea class="form-control" rows="3"></textarea>    
			           </div>
			        </div>

			   	</div>

			   	<hr>
		        <pre>Diagnóstico Final</pre>
			    <div class="row" style="padding:2em;">
			       <div class="col-sm-5">
			          <div class="form-group">
			             <label>Resultados: </label>
			               <textarea class="form-control" rows="3"></textarea>    
			           </div>
			        </div>   
			        
			        <div class="col-sm-5 col-md-offset-1">
			          <div class="form-group">
			             <label>Diagnóstico: </label>
			               <input type="text" name="fecha_nac" class="form-control" id="nacimiento" placeholder="Introduzca aquí el diagnóstico inicial">    
			           </div>
			        </div>

			   	</div>

			   	<hr>
		        <pre>Indicaciones y referencias</pre>
			    <div class="row" style="padding:2em;">
			       <div class="col-sm-5">
			          <div class="form-group">
			             <label>Indicaciones: </label>
			               <textarea class="form-control" rows="3"></textarea>    
			           </div>
			        </div>   
			        
			        <div class="col-sm-5 col-md-offset-1">
			          <div class="form-group">
			             <label>Referencias: </label>
			               <input type="text" name="fecha_nac" class="form-control" id="nacimiento" placeholder="Introduzca aquí el diagnóstico inicial">    
			           </div>
			        </div>

			   	</div>


      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <div class="datos">
          <button class="btn btn-default">Editar</button>
          <button type="submit" class="btn btn-success pull-right">Enviar</button>  
        </div>
      </div>
      <!-- /.box-footer -->
    </form>
  </div>  
	
</template>
<script>

	import axios from 'axios';

	export default{
		data() {
            return {

              consulta: {

              	signos: {
              		pa: '',
              		pulso: '',
              		temperatura: '',
              		peso: ''
              	},
              	inicial: {
              		sintomas: '',
              		observaciones: '',
              		dx_inicial: ''
              	},
              	plan: {
              		tratamiento: ''
              	},
              	pruebas: {
              		laboratorio: '',
              		rayos: ''
              	},
              	final: {
              		resultados: '',
              		dx_final: ''
              	},
              	referencias:{
              		indicaciones: '',
              		referencias: ''
              	}
                  
              }
            };
        },

	}


</script>