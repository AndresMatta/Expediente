@extends('adminlte::layouts.app')

@section('htmlheader_title')
	Usuarios
@endsection


@section('main-content')

@include('users.users-list')

@endsection

@section('scripts')
	@include('adminlte::layouts.partials.scripts')
	{!!Html::script('plugins/datatables/jquery.datatables.js')!!}
	{!!Html::script('js/users.js')!!}
	<script type="text/javascript">	
	$(function () {
     $('#users-list').DataTable( {
        language: {
        	search: "Buscar:",
            lengthMenu: "Mostrando _MENU_ registros por página",
            zeroRecords: "No se ha logrando encontrar lo solicitado",
            info: "Mostrando página _PAGE_ de _PAGES_",
            infoEmpty: "Ningún registro disponible",
            infoFiltered: "(filtrado de _MAX_ registros totales)",
            paginate: {
                first:      "Primero",
                previous:   "Anterior",
                next:       "Siguiente",
                last:       "Último"
            },
        }
    } );
} );
   </script>
@endsection

		
          
        