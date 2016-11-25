@extends('adminlte::layouts.app')

@section('htmlheader_title')
	Usuarios
@endsection

@section('htmlheader')
    @include('adminlte::layouts.partials.htmlheader')
    {{Html::style('css/tables.css')}}
@endsection

@section('main-content')

@include('users.forms.create_modal')
<users source="api/users"></users>

@endsection

@section('scripts')
@include('adminlte::layouts.partials.scripts')
{!!Html::script('js/tables/moment-with-locales.min.js')!!}
{!!Html::script('js/tables/sweetalert.min.js')!!}


@endsection

		
          
        