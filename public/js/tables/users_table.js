
    var E_SERVER_ERROR = 'Error en la comunicación con el servidor'
    // fields definition
    var tableColumns = [
        {
            name: 'id',
            title: '',
            dataClass: 'text-center',
            callback: 'showDetailRow'
        },
        {   
            title: 'Nombre Completo',
            name: 'name',
            sortField: 'name',
        },
        {
            title: 'Nombre de Usuario',
            name: 'username',
            sortField: 'username',
            callback: 'allCap'
        },
        {
            title: 'Tipo de Usuario',
            name: 'tipo',
            sortField: 'tipo'
        },
        {
            title: 'Fecha de creacion',
            name: 'created_at',
            sortField: 'created_at',
            callback: 'formatDate|D/MM/Y'
        },
        /*
        {
            name: 'gender',
            sortField: 'gender',
            titleClass: 'text-center',
            dataClass: 'text-center',
            callback: 'gender'
        },
        */
        /*
        {
            name: '__component:custom-action',
            title: "Component",
            titleClass: 'center aligned',
            dataClass: 'custom-action center aligned',
        },
        */
        {
            title: "Operaciones",
            name: '__actions',
            dataClass: 'text-center',
        }
    ]
    Vue.config.debug = true
    Vue.component('custom-action', {
        template: [
            '<div>',
                '<button @click="itemAction(\'view-item\', rowData)"><i class="fa fa-search-plus"></i></button>',
                '<button @click="itemAction(\'edit-item\', rowData)"><i class="fa fa-exclamation-circle"></i></button>',
                '<button @click="itemAction(\'delete-item\', rowData)"><i class="fa fa-trash"></i></button>',
            '</div>'
        ].join(''),
        props: {
            rowData: {
                type: Object,
                required: true
            }
        },
        methods: {
            itemAction: function(action, data) {
                sweetAlert('custom-action: ' + action, data.name)
            },
            onClick: function(event) {
                console.log('custom-action: on-click', event.target)
            },
            onDoubleClick: function(event) {
                console.log('custom-action: on-dblclick', event.target)
            }
        }
    })
    Vue.component('my-detail-row', {
        template: [
            '<div class="detail-row ui form" @click="onClick($event)">',
                '<div class="inline field">',
                    '<label>Nombre: </label>',
                    '<span>@{{rowData.name}}</span><br><br>',
                '</div>',
                '<div class="inline field">',
                    '<label>Email: </label>',
                    '<span>@{{rowData.email}}</span><br><br>',
                '</div>',
                '<div class="inline field">',
                    '<label>Nickname: </label>',
                    '<span>@{{rowData.nickname}}</span><br><br>',
                '</div>',
                '<div class="inline field">',
                    '<label>Birthdate: </label>',
                    '<span>@{{rowData.birthdate}}</span><br><br>',
                '</div>',
                '<div class="inline field">',
                    '<label>Gender: </label>',
                    '<span>@{{rowData.gender}}</span><br><br>',
                '</div>',
            '</div>',
        ].join(''),
        props: {
            rowData: {
                type: Object,
                required: true
            }
        },
        methods: {
            onClick: function(event) {
                console.log('my-detail-row: on-click')
            }
        },
    })
    new Vue({
        el: '#app',
        data: {
            searchFor: '',
            fields: tableColumns,
            sortOrder: [{
                field: 'name',
                direction: 'asc'
            }],
            multiSort: true,
            perPage: 10,
            paginationComponent: 'vuetable-pagination',
            paginationInfoTemplate: 'แสดง {from} ถึง {to} จากทั้งหมด {total} รายการ',
            itemActions: [
                { name: 'view-item', label: '', icon: 'fa fa-search-plus', class: 'btn btn-info', extra: {'title': 'Ver', 'data-toggle':"tooltip", 'data-placement': "top"} },
                { name: 'edit-item', label: '', icon: 'fa fa-exclamation-circle', class: 'btn btn-warning', extra: {title: 'Recordatorio', 'data-toggle':"tooltip", 'data-placement': "top"} },
                { name: 'delete-item', label: '', icon: 'fa fa-trash', class: 'btn btn-danger', extra: {title: 'Borrar', 'data-toggle':"tooltip", 'data-placement': "top" } }
            ],
            moreParams: [],
        },
        watch: {
            'perPage': function(val, oldVal) {
                this.$broadcast('vuetable:refresh')
            },
            'paginationComponent': function(val, oldVal) {
                this.$broadcast('vuetable:load-success', this.$refs.vuetable.tablePagination)
                this.paginationConfig(this.paginationComponent)
            }
        },
        methods: {
            /**
             * Callback functions
             */
            allCap: function(value) {
                return value.toUpperCase()
            },
            gender: function(value) {
              return value == 'M'
                ? '<span class="label label-info"><i class="fa fa-male"></i> Masculino</span>'
                : '<span class="label label-success"><i class="fa fa-female"></i> Femenino</span>'
            },
            formatDate: function(value, fmt) {
                if (value == null) return ''
                fmt = (typeof fmt == 'undefined') ? 'D MMM YYYY' : fmt
                return moment(value, 'YYYY-MM-DD').format(fmt)
            },
            showDetailRow: function(value) {
                var icon = this.$refs.vuetable.isVisibleDetailRow(value) ? 'fa fa-minus-circle' : 'fa fa-plus-circle'
                return [
                    '<a class="show-detail-row">',
                        '<i class="' + icon + '"></i>',
                    '</a>'
                ].join('')
            },
            /**
             * Other functions
             */

            setFilter: function() {
                this.moreParams = [
                    'filter=' + this.searchFor
                ]
                this.$nextTick(function() {
                    this.$broadcast('vuetable:refresh')
                })
            },
            resetFilter: function() {
                this.searchFor = ''
                this.setFilter()
            },
            preg_quote: function( str ) {
                // http://kevin.vanzonneveld.net
                // +   original by: booeyOH
                // +   improved by: Ates Goral (http://magnetiq.com)
                // +   improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
                // +   bugfixed by: Onno Marsman
                // *     example 1: preg_quote("$40");
                // *     returns 1: '\$40'
                // *     example 2: preg_quote("*RRRING* Hello?");
                // *     returns 2: '\*RRRING\* Hello\?'
                // *     example 3: preg_quote("\\.+*?[^]$(){}=!<>|:");
                // *     returns 3: '\\\.\+\*\?\[\^\]\$\(\)\{\}\=\!\<\>\|\:'
                return (str+'').replace(/([\\\.\+\*\?\[\^\]\$\(\)\{\}\=\!\<\>\|\:])/g, "\\$1");
            },
            highlight: function(needle, haystack) {
                return haystack.replace(
                    new RegExp('(' + this.preg_quote(needle) + ')', 'ig'),
                    '<span class="highlight">$1</span>'
                )
            },
            makeDetailRow: function(data) {
                return [
                    '<td colspan="7">',
                        '<div class="detail-row">',
                            '<div class="form-group">',
                                '<label>Name: </label>',
                                '<span>' + data.name + '</span>',
                            '</div>',
                            '<div class="form-group">',
                                '<label>Email: </label>',
                                '<span>' + data.email + '</span>',
                            '</div>',
                            '<div class="form-group">',
                                '<label>Nickname: </label>',
                                '<span>' + data.nickname + '</span>',
                            '</div>',
                            '<div class="form-group">',
                                '<label>Birthdate: </label>',
                                '<span>' + data.birthdate + '</span>',
                            '</div>',
                            '<div class="form-group">',
                                '<label>Sexo: </label>',
                                '<span>' + data.gender + '</span>',
                            '</div>',
                        '</div>',
                    '</td>'
                ].join('')
            },
            rowClassCB: function(data, index) {
                return (index % 2) === 0 ? 'positive' : ''
            },
            paginationConfig: function(componentName) {
                console.log('paginationConfig: ', componentName)
                if (componentName == 'vuetable-pagination') {
                    this.$broadcast('vuetable-pagination:set-options', {
                        wrapperClass: 'pagination',
                        icons: { first: '', prev: '', next: '', last: ''},
                        activeClass: 'active',
                        linkClass: 'btn btn-default',
                        pageClass: 'btn btn-default'
                    })
                }
                if (componentName == 'vuetable-pagination-dropdown') {
                    this.$broadcast('vuetable-pagination:set-options', {
                        wrapperClass: 'form-inline',
                        icons: { prev: 'fa fa-chevron-left', next: 'fa fa-chevron-right' },
                        dropdownClass: 'form-control'
                    })
                }
            },
            // -------------------------------------------------------------------------------------------
            // You can change how sort params string is constructed by overriding getSortParam() like this
            // -------------------------------------------------------------------------------------------
            // getSortParam: function(sortOrder) {
            //     console.log('parent getSortParam:', JSON.stringify(sortOrder))
            //     return sortOrder.map(function(sort) {
            //         return (sort.direction === 'desc' ? '+' : '') + sort.field
            //     }).join(',')
            // }
        
        },
        
        events: {
            'vuetable:row-changed': function(data) {
                //console.log('row-changed:', data.name)
            },
            'vuetable:row-clicked': function(data, event) {
                console.log('row-clicked:', data.name)
            },
            'vuetable:cell-clicked': function(data, field, event) {
                console.log('cell-clicked:', field.name)
                if (field.name !== '__actions') {
                    this.$broadcast('vuetable:toggle-detail', data.id)
                }
            },
            'vuetable:action': function(action, data) {
                console.log('vuetable:action', action, data)
                if (action == 'view-item') {
                    swal({
                          title: '<h2 class ="list-group-item-heading"><span class="fa fa-user"></span> Ver Usuario</h2>',
                          text: '<ul class="list-group"><a class="list-group-item">Nombre Completo: ' + data.name + '</a>' + '<a class= "list-group-item">Nombre de Usuario: ' + data.username + '</a>' + '<a class= "list-group-item">Tipo de Usuario: ' + data.tipo + '</a></ul>',
                          html: true
                    });
                } else if (action == 'edit-item') {
                    swal({
                          title: "Asignar recordatorio",
                          text: "Recordatorio para " + data.name,
                          type: "input",
                          showCancelButton: true,
                          closeOnConfirm: false,
                          animation: "slide-from-top",
                          inputPlaceholder: "Recordatorio"
                        },
                        function(inputValue){
                          if (inputValue === false) return false;
                          
                          if (inputValue === "") {
                            swal.showInputError("¡Es necesario escribir algo!");
                            return false
                          }
                          
                          swal("¡Excelente!", "Recordatorio creado satisfactoriamente", "success");
                        });
                } else if (action == 'delete-item') {
                    swal({
                          title: "¿Estás seguro?",
                          text: "¡" + data.name + " será eliminado del sistema!",
                          type: "warning",
                          showCancelButton: true,
                          confirmButtonColor: "#DD6B55",
                          confirmButtonText: "¡Sí, eliminarlo!",
                          cancelButtonText: "¡No, cancelar!",
                          closeOnConfirm: false,
                          closeOnCancel: false,
                          showLoaderOnConfirm: true
                        },
                        function(isConfirm){
                          if (isConfirm) {

                            
                            setTimeout(function(){
                                //Elimina el usuario
                            
                            swal("¡Eliminado!", data.name + " ha sido eliminado del sistema.", "success");
                          }, 2000)
                        } else {
                            swal("Cancelado", data.name + " está a salvo :)", "error");
                          }
                        });
                }
            },
            'vuetable:load-success': function(response) {
                var data = response.data.data
                console.log(data)
                if (this.searchFor !== '') {
                    for (n in data) {
                        data[n].name = this.highlight(this.searchFor, data[n].name)
                        data[n].username = this.highlight(this.searchFor, data[n].username)
                    }
                }
            },
            'vuetable:load-error': function(response) {
                if (response.status == 400) {
                    sweetAlert('Something\'s Wrong!', response.data.message, 'error')
                } else {
                    sweetAlert('Oops', E_SERVER_ERROR, 'error')
                }
            }
        },
    })