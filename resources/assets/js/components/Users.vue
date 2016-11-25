<template>
            <div class="panel panel-default panel-table">
              <div class="panel-heading">
                <div class="row">
                  <div class="col col-xs-6">
                    <h3 class="panel-title">Lista de Usuarios Registrados</h3>
                  </div>
                  <div class="col col-xs-6 text-right">
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#createModal"><span class="fa fa-plus"> Agregar</span></button>
                  </div>
                </div>
              </div>
              <div class="panel-body">
                <table class="table table-striped table-bordered table-list">
                  <thead>
                    <tr>
                        <th class="hidden-xs">ID</th>
                        <th>Nombre Completo</th>
                        <th>Nombre de Usuario</th>
                        <th>Tipo de Usuario</th>
                        <th>Fecha de Creación</th>
                        <th>Operaciones</th>
                    </tr> 
                  </thead>
                  <tbody>
                          <tr v-for="user in list">
                            <td class="hidden-xs">{{ user.id }}</td>
                            <td>{{ user.name }}</td>
                            <td>{{ user.username }}</td>
                            <td>{{ user.tipo }}</td>
                            <td>{{ user.created_at }}</td>
                            <td align="center">
                              <a class="btn btn-default"><em class="fa fa-pencil"></em></a>
                              <a class="btn btn-danger"><em class="fa fa-trash"></em></a>
                            </td>
                          </tr>
                        </tbody>
                </table>
            
              </div>
              <div class="panel-footer">
                <div class="row">
                  <div class="col col-xs-4">Page 1 of 5
                  </div>
                  <div class="col col-xs-8">
                    <ul class="pagination hidden-xs pull-right">
                      <li><a href="#">1</a></li>
                      <li><a href="#">2</a></li>
                      <li><a href="#">3</a></li>
                      <li><a href="#">4</a></li>
                      <li><a href="#">5</a></li>
                    </ul>
                    <ul class="pagination visible-xs pull-right">
                        <li><a href="#">«</a></li>
                        <li><a href="#">»</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>

</template>

<script>
    export default {

        data: function(){

            return {
                list: ['']
            };

        },

        created: function(){

            this.fetchUsers();

        },

        methods: {
        deleteUser: function(user){
            var index = this.list.indexOf(user);
            this.list.splice(index, 1);
        },
        fetchUsers: function(){
            this.$http.get('/api/users').then((response) => {
            this.list = response.data;
         });

        } 
    }  

    }


</script>
