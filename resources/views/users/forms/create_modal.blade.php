    
       <div class="modal fade" id="createModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                        <h4 class="modal-title">Añadir Usuario</h4>
                    </div>
                    <form id="usersForm" action="#" @submit.prevent="add()" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Usuario</label>
                                <input id="username" type="text" class="form-control" name="username" required autofocus>
                        </div>

                        <div class="form-group">
                            <label>Nombre Completo</label>
                                <input id="name" type="text" class="form-control" name="name" required>
                        </div>

                        <div class="form-group">
                            <label>Tipo de usuario</label>
                                <select id="tipo" class="form-control" name="tipo" placeholder="Seleccione el puesto" required>
                                    <option value="Recepcionista" selected="selected">Recepcionista</option>
                                    <option value="Administrador">Administrador</option>
                                    <option value="Médico">Médico</option>
                                </select>
                        </div>

                        <div class="form-group">
                            <label>Contraseña</label>
                                <input id="password" type="password" class="form-control" name="password" required>
                        </div>

                        <div class="form-group">
                            <label>Confirmar Contraseña</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
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
        