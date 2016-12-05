<template>

  <div class="dv animated fadeIn">
    <div class="dv-header">
      <div class="dv-header-title">
        <button class="dv-header-btn" data-toggle="modal" data-target="#createModal">
        <span class="fa fa-user-plus"></span>
        </button>
      </div>
      <div class="dv-header-columns">
        <span class="dv-header-pre">Buscar: </span>
        <select class="dv-header-select" v-model="query.search_column">
          <option v-for="column in columns" :value="column">{{column}}</option>
        </select>
      </div>
      <div class="dv-header-operators">
        <select class="dv-header-select" v-model="query.search_operator">
          <option v-for="(value, key) in operators" :value="key">{{value}}</option>
        </select>
      </div>
      <div class="dv-header-search">
        <input type="text" class="dv-header-input"
          placeholder="Buscar"
          v-model="query.search_input"
          @keyup.enter="fetchIndexData()">
      </div>
      <div class="dv-header-submit">
        <button class="dv-header-btn"@click="fetchIndexData()"><span class="fa fa-search"></span></button>
      </div>
    </div>
    <div class="dv-body">
      <table class="dv-table">
        <thead>
          <tr>
            <th v-for="column in columns" @click="toggleOrder(column)">
              <span>{{column}}</span>
              <span class="dv-table-column" v-if="column === query.column">
                <span v-if="query.direction === 'desc'">&darr;</span>
                <span v-else>&uarr;</span>
              </span>
            </th>
            <th>Operaciones</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="row in model.data">
            <td v-for="(value, key) in row">{{value}}</td>
            <td align="center">
            <button class="btn btn-default" @click="edit()"><span class="fa fa-pencil"></span></button>
            <button class="btn btn-default" @click="destroy(row)"><span class="fa fa-trash"></span></button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="dv-footer">
      <div class="dv-footer-item">
        <span>Mostrando {{model.from}} - {{model.to}} de {{model.total}} registros</span>
      </div>
      <div class="dv-footer-item">
        <div class="dv-footer-sub">
          <span>Registros por página</span>
          <input type="text" v-model="query.per_page"
            class="dv-footer-input"
            @keyup.enter="fetchIndexData()">
        </div>
        <div class="dv-footer-sub">
          <button class="dv-footer-btn" @click="prev()">&laquo;</button>
          <input type="text" v-model="query.page"
            class="dv-footer-input"
            @keyup.enter="fetchIndexData()">
          <button class="dv-footer-btn" @click="next()">&raquo;</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
    import Vue from 'vue';
    import axios from 'axios';

    export default {

        props: [ 'source', 'tittle' ],

        data(){

            return {
                model: {},
                columns: {},
                query: {
                  page: 1,
                  column: 'id',
                  direction: 'desc',
                  per_page: 10,
                  search_column: 'id',
                  search_operator: 'equal',
                  search_input: ''
                },
                operators: {
                  equal: '=',
                  not_equal: '<>',
                  less_than: '<',
                  greater_than: '>',
                  less_than_or_equal_to: '<=',
                  greater_than_or_equal_to: '>=',
                  in: 'IN',
                  like: 'LIKE'
                }
            };

        },

        created: function(){

            this.fetchIndexData();

        },

        methods: {

        edit(){

        swal('Any fool can use a computer');
        toastr.info('Are you the 6 fingered man?')
            
        },

        destroy(row){

        var vm = this

        swal({
          title: '¿Estás seguro?',
          text: "¡"+ row.name +" será elimiado de forma permanente del sistema!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: '¡Sí, quiero eliminarlo!',
          cancelButtonText: '¡No, cancelar!',
          confirmButtonClass: 'btn btn-success',
          cancelButtonClass: 'btn btn-danger',
          animation: false,
          customClass: 'animated tada',
          showLoaderOnConfirm: true,
          buttonsStyling: true,
          preConfirm: function () {
            return new Promise(function (resolve, reject) {

                axios.delete(`api/users/${row.id}`)
                .then(function(response) {
                    console.log(response)
                    resolve()
                    vm.fetchIndexData()
                    })    
                .catch(function(response) {
                    console.log(response)
                    reject('Error al ejecutar la operacion.')
                    })                
            })
        },
        allowOutsideClick: false
        }).then(function () {

          swal(
           '¡Eliminado!',
            row.name +' ha sido borrado del sistema.',
            'success'
            )

        }, function (dismiss) {
          // dismiss can be 'cancel', 'overlay',
          // 'close', and 'timer'
          if (dismiss === 'cancel') {
            swal(
              'Cancelado',
              row.name + ' está a salvo :)',
              'error'
            )
          }
        })

        },

        next(){

          if (this.model.next_page_url) {
            this.query.page++
            this.fetchIndexData()
          }

        },

        prev(){
          
          if (this.model.prev_page_url) {
            this.query.page--
            this.fetchIndexData()
          }

        },

        toggleOrder(column) {
        if(column === this.query.column) {
          // only change direction
          if(this.query.direction === 'desc') {
            this.query.direction = 'asc'
          } else {
            this.query.direction = 'desc'
          }
        } else {
          this.query.column = column
          this.query.direction = 'asc'
        }
        this.fetchIndexData()
      },


        fetchIndexData() {
        var vm = this
        axios.get(`${this.source}?column=${this.query.column}&direction=${this.query.direction}&page=${this.query.page}&per_page=${this.query.per_page}&search_column=${this.query.search_column}&search_operator=${this.query.search_operator}&search_input=${this.query.search_input}`)
          .then(function(response) {
            Vue.set(vm.$data, 'model', response.data.model)
            Vue.set(vm.$data, 'columns', response.data.columns)
          })
          .catch(function(response) {
            console.log(response)
          })
      }
    } 

    }


</script>
