  <div class="box box-primary" style="padding: 1em;">

  <div class="box-body">
      <div id="app" class="container col col-md-12">
      <!-- Example row of columns -->
        <div class="row">
            <div class="col-md-7 form-inline">
                <div class="form-inline form-group">
                    <label>Buscar:</label>
                    <input v-model="searchFor" class="form-control" @keyup.enter="setFilter">
                    <button class="btn btn-primary" @click="setFilter"><span class="fa fa-search"></span></button>
                    <button class="btn btn-default" @click="resetFilter"><span class="fa fa-refresh"></span></button>
                </div>
            </div>
            <div class="col-md-5">
                <div class="form-inline form-group pull-right">
                    <button class="btn btn-default" data-toggle="modal" data-target="#settingsModal">
                        <span class="fa fa-cog"></span> Opciones
                    </button>
                </div>
                <div class="form-inline form-group pull-right" style="padding-right: 5px;">
                    <button class="btn btn-default" data-toggle="modal" data-target="#createModal">
                        <span class="fa fa-plus"></span> Agregar
                    </button>
                </div>
            </div>
        </div>
        @include('users.forms.settings_modal')
        @include('users.forms.create_modal')
        <div class="table-responsive">
            <vuetable v-ref:vuetable
                api-url="/api/users"
                pagination-path=""
                :fields="fields"
                :sort-order="sortOrder"
                :multi-sort="multiSort"
                table-class="table table-bordered table-striped table-hover"
                ascending-icon="fa fa-chevron-up"
                descending-icon="fa fa-chevron-down"
                pagination-class=""
                pagination-info-class=""
                pagination-component-class=""
                :pagination-component="paginationComponent"
                :item-actions="itemActions"
                :append-params="moreParams"
                :per-page="perPage"
                wrapper-class="vuetable-wrapper"
                table-wrapper=".vuetable-wrapper"
                loading-class="loading"
                detail-row-component="my-detail-row"
                detail-row-id="id"
                detail-row-transition="expand"
                row-class-callback="rowClassCB"
            ></vuetable>
        </div>

    </div> <!-- /container -->
  </div>
</div>  