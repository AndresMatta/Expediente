<template>
    <div class="modal fade" id="createModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                        <h4 class="modal-title">Añadir Usuario</h4>
                    </div>
                    <form v-on:submit.prevent="submit()" method="post">
                    <div class="modal-body">
                    
                        <div class="form-group">
                            <label>Usuario</label>
                                <input id="username" type="text" class="form-control" name="username" required autofocus v-model="user.username">
                        </div>

                        <div class="form-group">
                            <label>Nombre Completo</label>
                                <input id="name" type="text" class="form-control" name="name" required v-model="user.name">
                        </div>

                        <div class="form-group">
                            <label>Tipo de usuario</label>
                                <select id="tipo" class="form-control" name="tipo" placeholder="Seleccione el puesto" required v-model="user.tipo">
                                    <option value="Recepcionista">Recepcionista</option>
                                    <option value="Administrador">Administrador</option>
                                    <option value="Médico">Médico</option>
                                </select>
                        </div>

                        <div class="form-group">
                            <label>Contraseña</label>
                                <input id="password" type="password" class="form-control" name="password" required v-model="user.password">
                        </div>

                        <div class="form-group">
                            <label>Confirmar Contraseña</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required v-model="user.re_password">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-default">Agregar</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div>
                </form>
            
            </div>
        </div>
    </div>    
</template>

<script>

    import axios from 'axios';

    export default {

        data(){
            return {
              user: {
                  name: '',
                  username: '',
                  tipo: '',
                  password: '',
                  re_password: ''
              }
            };
        },
        methods: {
            submit(){

                var vm = this

                axios.post('/users/', vm.user)
                .then(function (response) {
                console.log(response);
                vm.user = {name: '', username: '', tipo:'', password: ''};
                toastr.success('Usuario agregado correctamente.', 'vm.user.name', {timeOut: 10000})
                })
                .catch(function (error) {
                console.log('Se ha encontrado un error: ' + error);
                });

                }
            }
        }
</script>
