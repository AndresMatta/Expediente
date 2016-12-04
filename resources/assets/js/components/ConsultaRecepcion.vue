<template>  
  <div class="box box-success">
    <div class="box-header with-border">
              <h3 class="box-title">Iniciar una nueva consulta</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              </div><!-- /.box-tools -->
            </div><!-- /.box-header -->
    <!-- /.box-header -->
    <!-- form start -->
    <form class="form-horizontal" v-on:submit.prevent="submit()" method="post">
      <div class="box-body">
        <div class="row" style="padding:1em;">
          <div class="col-sm-4">
            <div class="form-group">
              <label for="cedula" class="col-sm-2 control-label">Cédula</label>
                <div class="col-sm-8">
                  <input type="text" name="cedula" class="form-control" id="cedula" placeholder="Introduzca la cédula" required v-model="paciente.cedula">  
                </div>
                <div class="col-sm-1">
                  <button class="btn btn-default" @click.prevent="fetchPaciente()"><span class="fa fa-search"> </span></button>  
                </div>
              </div>
          </div>  
        </div>

        <hr>

        <div class="datos" v-if="datos">

            <div class="row" style="padding-left:2em;">
              <div class="col-sm-5">
                <div class="form-group">
                <label>Nombre Completo</label>
                    <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Introduzca aquí el nombre del paciente" v-model="paciente.nombre">  
                </div>  
              </div>
            
              <div class="col-sm-2 col-md-offset-1">
                <div class="form-group">
                <label>Fecha de Nacimiento</label>
                    <input type="date" name="fecha_nac" class="form-control" id="cedula" placeholder="Introduzca aquí el número de cédula" v-model="paciente.nacimiento">  
                </div>  
              </div> 

              <div class="formulario col-sm-3 col-md-offset-1">
              <label>Sexo</label>
                <div class="form-group radio">
                    <input type="radio" name="sexo" id="Masculino" value="Masculino" v-model="paciente.sexo">
                    <label for="Masculino">Masculino</label>
                    <input type="radio" name="sexo" id="Femenino" value="Femenino" v-model="paciente.sexo">
                    <label for="Femenino">Femenino</label>
                </div>  
              </div>
            </div>
            
            <div class="row" style="padding-left: 2em;">
              
              <div class="col-sm-2">
                <div class="form-group">
                    <label>Teléfono móvil:</label>

                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-mobile"></i>
                      </div>
                      <input type="text" class="form-control" data-inputmask="&quot;mask&quot;: &quot;9999-9999&quot;" data-mask="" v-model="paciente.celular">
                    </div>
                    <!-- /.input group -->
                  </div> 
              </div>
            
              <div class="col-sm-2 col-sm-offset-1">
                <div class="form-group">
                    <label>Teléfono fijo:</label>

                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-phone"></i>
                      </div>
                      <input type="text" class="form-control" data-inputmask="&quot;mask&quot;: &quot;9999-9999&quot;" data-mask="" v-model="paciente.telefono">
                    </div>
                    <!-- /.input group -->
                  </div> 
              </div>

              <div class="col-sm-5 col-sm-offset-1" style="padding-right:1em;">
                <div class="form-group">
                <label>Dirección exacta</label>
                    <textarea class="form-control" rows="3" v-model="paciente.direccion"></textarea>
                </div>  
              </div>

            </div>

            <div class="row" style="padding-left: 2em;">
              
              <div class="col-sm-5">
                <div class="form-group">
                <label>Nombre de la madre</label>
                    <input type="text" name="madre" class="form-control" id="madre" placeholder="Introduzca aquí el número del celular" v-model="paciente.madre">  
                </div>  
              </div>
            
              <div class="col-sm-5 col-sm-offset-1">
                <div class="form-group">
                <label>Nombre del padre</label>
                    <input type="text" name="padre" class="form-control" id="padre" placeholder="Introduzca aquí el número fijo" v-model="paciente.padre">  
                </div>  
              </div>  
        </div>

        </div>  

      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <div class="datos" v-if="datos">
          <button class="btn btn-default" @click.prevent="iniciarConsulta">Editar</button>
          <button type="submit" class="btn btn-success pull-right">Enviar</button>  
        </div>
      </div>
      <!-- /.box-footer -->
    </form>
  </div>  
</template>
<script>
  
  import axios from 'axios';
  export default {

      data() {
            return {
              datos: false,
              existe: false,
              paciente: {
                  id: '',
                  cedula: '',
                  nombre: '',
                  nacimiento: '',
                  sexo: '',
                  celular: '',
                  telefono: '',
                  direccion: '',
                  padre: '',
                  madre: ''
              }
            };
        },

        methods: {

            submit(){

            if (this.existe==false){
              this.crearPaciente()
              this.iniciarConsulta()
            }else{
              this.iniciarConsulta()
            } 
            },

            iniciarConsulta(){

                var vm = this

                axios.post(`api/consulta/${vm.paciente.cedula}`).then(function (response) {
                console.log(response);
                vm.paciente = {
                  id:'', cedula: '', nombre: '', nacimiento:'', sexo: '', celular: '', 
                  telefono: '', direccion:'',padre: '', madre: ''
                };
                vm.datos=false;
                toastr.success('Consulta enviada al médico de turno.', vm.paciente.nombre, {timeOut: 5000})
                })   
                .catch(function (error) {
                console.log('Se ha encontrado un error: ' + error);
                });

                },

            crearPaciente(){

                var vm = this

                axios.post('/pacientes/', vm.paciente).then(function (response) {
                console.log(response);
                toastr.success('Paciente ingresado al sistema.', vm.paciente.nombre, {timeOut: 5000})
                })   
                .catch(function (error) {
                console.log('Se ha encontrado un error: ' + error);
                });

                },

            fetchPaciente(){

                var vm = this

                axios.get(`api/paciente/${vm.paciente.cedula}`).then(function (response) {

                console.log(response);
                  vm.paciente = {
                  id: response.data.id, cedula: vm.paciente.cedula, 
                  nombre: response.data.nombre, nacimiento: response.data.nacimiento, 
                  sexo: response.data.sexo, celular: response.data.celular, 
                  telefono: response.data.telefono, direccion: response.data.direccion, 
                  padre: response.data.padre, madre: response.data.madre
                  };
                    
                  if (vm.paciente.id) {
                    vm.existe = true;
                    toastr.info('Datos del paciente obtenidos.', vm.paciente.nombre, {timeOut: 5000})  
                  }else{
                    vm.existe = false;
                    toastr.warning('Paciente no ha sido registrado en el sistema.', vm.paciente.cedula, {timeOut: 5000})
                  }
                  }).catch(function (error) {

                      console.log('Se ha encontrado un error: ' + error);
                      vm.existe = false;
                      toastr.warning('Paciente no ha sido registrado en el sistema.', vm.paciente.cedula, {timeOut: 5000})

                  });

                  vm.datos = true;
                }
            }


        }

</script>