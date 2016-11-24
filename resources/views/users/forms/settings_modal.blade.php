<div class="modal fade" id="settingsModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                        <h4 class="modal-title">Opciones</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" v-model="multiSort"> Multisort (use Alt+Click)
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Paginación:</label>
                            <select class="form-control" v-model="paginationComponent">
                                <option value="vuetable-pagination">Paginación 1</option>
                                <option value="vuetable-pagination-dropdown">Paginación 2</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Registros por Página:</label>
                            <select class="form-control" v-model="perPage">
                                <option value=5>5</option>
                                <option value=10>10</option>
                                <option value=20>20</option>
                                <option value=40>40</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">Registros Visibles</h4>
                                </div>
                                <div class="panel-body">
                                    <div class="checkbox" v-for="field in fields">
                                        <label>
                                            <input type="checkbox" v-model="field.visible">
                                            @{{ field.title == '' ? field.name.replace('__', '') : field.title | capitalize }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>