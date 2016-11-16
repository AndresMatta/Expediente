<template>
    <table id="users-list" class="table table-striped display" width="100%" cellspacing="0">
  
    <thead>
      <tr class="box-primary">
        <th>Nombre Completo</th>
        <th>Nombre de Usuario</th>
        <th>Tipo de Usuario</th>
        <th>Última actividad</th>
        <th>Fecha de Creación</th>
        <th>Operaciones</th>
      </tr>
    </thead>  
    <tbody>
      <tr v-for="user in list">
        <td>{{ user.name }}</td>
        <td>{{ user.username }}</td>
        <td>{{ user.tipo }}</td>
        <td>Registro aún no creado</td>
        <td>{{ user.created_at }}</td>
        <td>
        <a href="#" class="btn btn-info" @click="edit(task)">
        <i class="fa fa-pencil fa-2x"></i>
        </a>
        <a href="#" class="btn btn-danger" @click="delete(task)">
        <i class="fa fa-trash fa-2x"></i>
        </a>
        </td>
      </tr>
    </tbody>
    <tfoot>
      <tr>
        <th>Nombre Completo</th>
        <th>Nombre de Usuario</th>
        <th>Tipo de Usuario</th>
        <th>Última actividad</th>
        <th>Fecha de Creación</th>
        <th>Operaciones</th>
      </tr>
    </tfoot>
    </table>
</template>

<script>
    export default {

        data: function(){
        return { list: [''] };
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