<template>
	<div class="box box-success animated fadeIn">
		<div class="box-header with-border">
			<h4>Consultas Pedientes</h4>
		</div>
		<div class="box-body">
			<table class="table table-bordered table-hover">
				<thead>
					<th style="padding:1em;"><span class="fa fa-id-card-o"></span> Numero de Cédula</th>
					<th style="padding:1em;"><span class="fa fa-user"></span> Nombre Completo</th>
					<th style="padding:1em;"><span class="fa fa-mars"></span> Sexo</th>
					<th style="padding:1em;"><span class="fa fa-birthday-cake"></span> Fecha de Nacimiento</th>
					<th style="padding:1em;"><span class="fa fa-cogs"></span> Operaciones</th>
				</thead>
				<tbody>
					<tr v-for="consulta in activas">
						<td>{{ consulta.paciente.cedula }}</td>
						<td>{{ consulta.paciente.nombre }}</td>
						<td>{{ consulta.paciente.sexo }}</td>
						<td>{{ consulta.paciente.nacimiento }}</td>
						<td align="center">
							<a v-bind:href="'/consultas/atencion/'+ consulta.id" class="btn btn-success" role="button"> Atender Paciente
							<span class="fa fa-stethoscope"></span></a>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="box-footer">

		</div>
	</div>	
</template>
<script>

	import axios from 'axios';

	export default{

		data() {
            return {
              estado : 'Espera',
              activas: {}
            };
        },

        created: function(){

            this.fetchConsultas();

        },

        methods: {

        	fetchConsultas(){

                var vm = this

                axios.get(`consultas/pendientes/${vm.estado}`).then(function (response) {
                	console.log(response);
                	Vue.set(vm.$data, 'activas', response.data.consultas)
                  }).catch(function (error) {
                      console.log('Se ha encontrado un error: ' + error);
                  });

            },

        }

	}

</script>
