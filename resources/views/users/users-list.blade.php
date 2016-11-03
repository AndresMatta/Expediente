<div class="box box-primary" style="padding: 1em;">
  <div class="box-header">
  <div class="col-sm-6">
    <h3 class="box-title">Panel de Usuarios</h3>
    <label style="padding-top: 1em;">En esta sección se pueden observar y gestionar los usuarios registrados al sistema</label>
  </div>
  <div class="col-sm-6">
    <a href="#" class="btn btn-app btn-primary pull-right">
        <i class="fa fa-user-plus"></i> Agregar
    </a>  
  </div>
  </div>
  <div class="box-body">
  <table id="users-list" class="display" width="100%" cellspacing="0">
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
    @foreach ($users as $user)
      <tr>
        <td>{{ $user->name }}</td>
        <td>{{ $user->username }}</td>
        <td>{{ $user->tipo }}</td>
        <td>Registro aún no creado</td>
        <td>{{ $user->created_at }}</td>
        <td><a href="#" class="btn btn-app btn-danger" @click="delete(task)">
        <i class="fa fa-trash"></i> Eliminar
    </a></td>
      </tr>
    @endforeach
    <tr>
        <td>Ejemplo</td>
        <td>Ejemplo</td>
        <td>Ejemplo</td>
        <td>Registro aún no creado</td>
        <td>Ejemplo</td>
        <td><a href="#" class="btn btn-app btn-danger" @click="delete(task)">
        <i class="fa fa-trash"></i> Eliminar
    </a></td>
      </tr>
    </tbody>
    </div>
    <div class="box-footer">
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
    </div>
  </table>
</div>  