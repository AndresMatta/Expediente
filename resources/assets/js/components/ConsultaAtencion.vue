<template>
	<div class="box box-success animated fadeIn">
    <div class="box-header with-border">
              <h3 class="box-title">Consulta de Medicina General</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div><!-- /.box-tools -->
              <hr>
              <a class="btn btn-app " :class="classDatos" @click="showDatos()">
                <i class="fa fa-address-book-o"></i>Datos
              </a>
              <a class="btn btn-app" :class="classSignos" @click="showSignos()">
                <i class="fa fa-heartbeat"></i>Signos
              </a>
              <a class="btn btn-app" :class="classInicial" @click="showInicial()">
                <i class="fa fa-user-md"></i>Inicial
              </a>
              <a class="btn btn-app" :class="classPlan" @click="showPlan()">
                <i class="fa fa-medkit"></i>Plan
              </a>
              <a class="btn btn-app" :class="classPruebas" @click="showPruebas()">
                <i class="fa fa-file-archive-o"></i>Pruebas
              </a>
              <a class="btn btn-app" :class="classDx" @click="showDx()">
                <i class="fa fa-bed"></i>Diagnóstico
              </a>
              <a class="btn btn-app" :class="classRef" @click="showRef()">
                <i class="fa fa-ambulance"></i>Referencias
              </a>
            </div><!-- /.box-header -->
    <!-- /.box-header -->
    <!-- form start -->
    <form class="form-horizontal" v-on:submit.prevent="addConsulta()" method="post">
      <div class="box-body">
      <pre>Datos Personales</pre>

      <transition
      name="custom-classes-transition"
      enter-active-class="animated fadeInUp"
      leave-active-class="animated fadeOut"
      >
        <div class="row" style="padding:2em;" v-if="datosSection">
          <div class="col-sm-3">
            <div class="form-group">
              <label>Cédula:</label>
                  <input type="text" name="cedula" class="form-control" id="cedula" placeholder="Introduzca la cédula" v-model="paciente.cedula" disabled="disabled">    
              </div>
          </div>  
              <div class="col-sm-5 col-md-offset-1">
                <div class="form-group">
                <label>Nombre Completo: </label>
                    <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Introduzca aquí el nombre del paciente" v-model="paciente.nombre" 
                    disabled="disabled">  
                </div>  
              </div>
            
              <div class="col-sm-2 col-md-offset-1">
                <div class="form-group">
                <label>Fecha de Nacimiento: </label>
                    <input type="date" name="fecha_nac" class="form-control" id="nacimiento" placeholder="Introduzca aquí el número de cédula" 
                    v-model="paciente.nacimiento" disabled="disabled">  
                </div>  
              </div> 

            </div>
      </transition>
        


      <hr>
      <pre>Signos Vitales</pre>
      <transition
      name="custom-classes-transition"
      enter-active-class="animated fadeInUp"
      leave-active-class="animated fadeOut"
      >
        <div class="row" style="padding: 2em;" v-if="signosSection">
              
              <div class="col-sm-2">
                <div class="form-group">
                    <label>Presion:</label>

                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-heart"></i>
                      </div>
                      <input type="text" class="form-control" maxlength="3" v-model="actual.signos.presion_arterial">
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
                      <input type="text" class="form-control" data-inputmask="&quot;mask&quot;: &quot;9999-9999&quot;" data-mask="" v-model="actual.signos.frecuencia_cardiaca">
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
                      <input type="text" class="form-control" data-inputmask="&quot;mask&quot;: &quot;9999-9999&quot;" data-mask="" v-model="actual.signos.temperatura">
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
                      <input type="text" class="form-control" data-inputmask="&quot;mask&quot;: &quot;9999-9999&quot;" data-mask="" v-model="actual.signos.peso">
                    </div>
                    <!-- /.input group -->
                  </div> 
              </div>

            </div>
      </transition>
            
      <hr>
      <pre>Diagnóstico Inicial</pre>
      <transition
      name="custom-classes-transition"
      enter-active-class="animated fadeInUp"
      leave-active-class="animated fadeOut"
      >
          <div class="row" style="padding:2em;" v-if="inicialSection">
            <div class="col-sm-5">
              <div class="form-group">
                <label>Síntomas: </label>
                    <textarea class="form-control" rows="3" v-model="actual.inicial.sintomas"></textarea>    
                </div>
            </div>  
                <div class="col-sm-5 col-sm-offset-1">
              <div class="form-group">
                <label>Observaciones: </label>
                    <textarea class="form-control" rows="3" 
                    v-model="actual.inicial.observaciones"></textarea>    
                </div>
            </div> 
              
                <div class="col-sm-4">
                  <div class="form-group">
                  <label>Diagnóstico Inicial: </label>
                      <input type="text" name="fecha_nac" class="form-control" id="nacimiento" placeholder="Introduzca aquí el diagnóstico inicial" 
                      v-model="actual.inicial.dx_inicial">  
                  </div>  
                </div> 

              </div>
      </transition>
	        
		  <hr>
		  <pre>Plan</pre>
      <transition
      name="custom-classes-transition"
      enter-active-class="animated fadeInUp"
      leave-active-class="animated fadeOut"
      >
        <div class="row" style="padding:2em;" v-if="planSection">
             <div class="col-sm-5">
                <div class="form-group">
                   <label>Tratamientos: </label>
                     <textarea class="form-control" rows="3" 
                     v-model="actual.plan.tratamiento"></textarea>    
                 </div>
              </div>   
                 
          </div>
      </transition>

      <hr>
      <pre>Pruebas diagnósticas</pre>
      <transition
      name="custom-classes-transition"
      enter-active-class="animated fadeInUp"
      leave-active-class="animated fadeOut"
      >
          <div class="row" style="padding:2em;" v-if="pruebasSection">
             <div class="col-sm-5">
                <div class="form-group">
                   <label>Laboratorio: </label>
                     <textarea class="form-control" rows="3" v-model="actual.pruebas.laboratorio"></textarea>    
                 </div>
              </div>   
              
              <div class="col-sm-5 col-md-offset-1">
                <div class="form-group">
                   <label>Rayos X: </label>
                     <textarea class="form-control" rows="3" v-model="actual.pruebas.rayos">
                     </textarea>    
                 </div>
              </div>

          </div>
      </transition>
			    
			<hr>
		  <pre>Diagnóstico Final</pre>
      <transition
      name="custom-classes-transition"
      enter-active-class="animated fadeInUp"
      leave-active-class="animated fadeOut"
      >
        <div class="row" style="padding:2em;" v-if="dxSection">
           <div class="col-sm-5">
              <div class="form-group">
                <label>Resultados: </label>
                    <textarea class="form-control" rows="3" 
                    v-model="actual.final.resultados"></textarea>    
                </div>
            </div>  
                <div class="col-sm-5 col-sm-offset-1">
              <div class="form-group">
                <label>Indicaciones: </label>
                    <textarea class="form-control" rows="3" 
                    v-model="actual.final.indicaciones"></textarea>    
                </div>
            </div> 
              
                <div class="col-sm-4">
                  <div class="form-group">
                  <label>Diagnóstico Final: </label>
                      <input type="text" name="fecha_nac" class="form-control" id="nacimiento" placeholder="Introduzca aquí el diagnóstico inicial" 
                      v-model="actual.final.dx_final">  
                  </div>  
                </div> 

          </div>
      </transition>
			    
			<hr>
		  <pre>Referencias</pre>
      <transition
      name="custom-classes-transition"
      enter-active-class="animated fadeInUp"
      leave-active-class="animated fadeOut"
      >
          <div class="row" style="padding:2em;" v-if="refSection">
               
              <div class="col-sm-5">
                <div class="form-group">
                   <label>Referencias: </label>
                     <input type="text" name="fecha_nac" class="form-control" id="nacimiento" placeholder="Introduzca aquí el diagnóstico inicial" 
                     v-model="actual.referencias.referencias">    
                 </div>
              </div>
          </div>
      </transition>

      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <div class="datos">
        <label>¿Desea concluír la consulta?</label>
          <select class="form-control" v-model="actual.estado" required="required">
                    <option value="Guardada">Guardar</option>
                    <option value="Concluida">Dar Salida</option>
                  </select>
          <hr>
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
    props: ['id'],
		data() {
            return {

              existe: false,

              datosIsActive : true,
              datosSection: true,

              signosIsActive : false,
              signosSection: false,

              inicialIsActive : false,
              inicialSection: false,

              planIsActive : false,
              planSection: false,

              pruebasIsActive : false,
              pruebasSection: false,

              dxIsActive : false,
              dxSection: false,

              refIsActive : false,
              refSection: false,

              paciente: {
                nombre: '',
                cedula: '',
                nacimiento: ''
              },

              actual: {

                consulta_id : this.id,
                estado: '',
              	signos: {
              		presion_arterial: '',
              		frecuencia_cardiaca: '',
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
                  indicaciones: '',
              		dx_final: ''
              	},
              	referencias:{
              		referencias: ''
              	}
                  
              }
            };
        },

        computed: {

          classDatos: function () {
            return {
              active: this.datosIsActive,
              'btn-success': this.datosIsActive,
            }
          },

          classSignos: function () {
            return {
              active: this.signosIsActive,
              'btn-success': this.signosIsActive,
            }
          },

          classInicial: function () {
            return {
              active: this.inicialIsActive,
              'btn-success': this.inicialIsActive,
            }
          },

          classPlan: function () {
            return {
              active: this.planIsActive,
              'btn-success': this.planIsActive,
            }
          },

          classPruebas: function () {
            return {
              active: this.pruebasIsActive,
              'btn-success': this.pruebasIsActive,
            }
          },

          classDx: function () {
            return {
              active: this.dxIsActive,
              'btn-success': this.dxIsActive,
            }
          },

          classRef: function () {
            return {
              active: this.refIsActive,
              'btn-success': this.refIsActive,
            }
          }
        },

        created: function(){

            this.fetchConsulta();

        },

        methods: {

          fetchConsulta(){

                var vm = this

                axios.get('/api/actual/' + this.id).then(function (response) {
                  console.log(response);
                  vm.paciente.cedula = response.data.paciente.cedula;
                  vm.paciente.nombre = response.data.paciente.nombre;
                  vm.paciente.nacimiento = response.data.paciente.nacimiento;

                  if (response.data.estado != 'Espera') {
                    vm.existe = true;
                    vm.fetchConsultaGuardada();
                  }
                  
                }).catch(function (error) {
                  console.log('Se ha encontrado un error: ' + error);
                });

          },

          fetchConsultaGuardada(){

            var vm = this

            axios.get('/api/guardada/' + this.id).then(function(response){
              //Valores de Signos
              vm.actual.signos.presion_arterial = response.data.signos.presion_arterial;
              vm.actual.signos.frecuencia_cardiaca = response.data.signos.frecuencia_cardiaca;
              vm.actual.signos.temperatura = response.data.signos.temperatura;
              vm.actual.signos.peso = response.data.signos.peso;
              //Valores Inicial
              vm.actual.inicial.sintomas = response.data.condicion.sintomas;
              vm.actual.inicial.observaciones = response.data.condicion.observaciones;
              vm.actual.inicial.dx_inicial = response.data.condicion.dx_inicial;
              //Valores Plan
              vm.actual.plan.tratamiento = response.data.plan.tratamiento;
              //Valores Pruebas
              vm.actual.pruebas.laboratorio = response.data.laboratorios.lab;
              vm.actual.pruebas.rayos = response.data.rayos.rx;
              //Valores Dx Final
              vm.actual.final.resultados = response.data.diagnostico.resultados;
              vm.actual.final.indicaciones = response.data.diagnostico.indicaciones;
              vm.actual.final.dx_final = response.data.diagnostico.dx;
              //Valores Referencias
              vm.actual.referencias.referencias = response.data.referencias.referencia;
              vm.existe = true;

            }).catch(function(error){
              console.log('Se ha encontrado un error: ' + error);
            });

          },

          addConsulta(){

                var vm = this

                swal({
                  title: '¿Estás seguro?',
                  text: "¡Serás redireccionado a la página principal!",
                  type: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: '¡Sí, proceder!',
                  cancelButtonText: '¡No, cancelar!',
                  confirmButtonClass: 'btn btn-success',
                  cancelButtonClass: 'btn btn-danger',
                  animation: false,
                  customClass: 'animated tada',
                  showLoaderOnConfirm: true,
                  buttonsStyling: true,
                  preConfirm: function (email) {
                    return new Promise(function (resolve, reject) {
                      setTimeout(function() {
                        if (vm.existe == true) {
                        axios.put('/consultas/' + vm.id, vm.actual).then(function (response) {
                          console.log(response);
                          resolve()
                        })   
                        .catch(function (error) {
                          console.log('Se ha encontrado un error: ' + error);
                          reject('Error al ejecutar la operación: PUT')
                        });  
                      }else{
                        axios.post('/consultas/', vm.actual).then(function (response) {
                          console.log(response);
                          resolve()
                        })   
                        .catch(function (error) {
                          console.log('Se ha encontrado un error: ' + error);
                          reject('Error al ejecutar la operación: POST')
                        });  
                      }        
                      }, 2000)
                    })
                  },
                  allowOutsideClick: false
                }).then(function () {
                  swal({
                    type: 'success',
                    title: '¡Acción terminada!',
                    text: 'Serás redireccionado al pulsar el botón.',
                  }).then(function(){
                    window.location.href="/home/";
                  });
                }, function (dismiss) {
                  // dismiss can be 'cancel', 'overlay',
                  // 'close', and 'timer'
                  if (dismiss === 'cancel') {
                    swal(
                      'Cancelado',
                      'Operación anulada',
                      'error'
                    )
                  }
                })      
          },
          
          showDatos() {
            this.datosIsActive =! this.datosIsActive;
            this.datosSection =! this.datosSection;
          },

          showSignos() {
            this.signosIsActive =! this.signosIsActive;
            this.signosSection =! this.signosSection;
          },

          showInicial() {
            this.inicialIsActive =! this.inicialIsActive;
            this.inicialSection =! this.inicialSection;
          },

          showPlan() {
            this.planIsActive =! this.planIsActive;
            this.planSection =! this.planSection;
          },

          showPruebas() {
            this.pruebasIsActive =! this.pruebasIsActive;
            this.pruebasSection =! this.pruebasSection;
          },

          showDx() {
            this.dxIsActive =! this.dxIsActive;
            this.dxSection =! this.dxSection;
          },

          showRef() {
            this.refIsActive =! this.refIsActive;
            this.refSection =! this.refSection;
          },

        }

	}


</script>