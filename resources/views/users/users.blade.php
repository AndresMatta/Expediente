@extends('adminlte::layouts.app')

@section('htmlheader_title')
	Usuarios
@endsection

@section('htmlheader')
    @include('adminlte::layouts.partials.htmlheader')
    {{Html::style('css/tables.css')}}
@endsection

@section('main-content')

<users-create></users-create>
<users source="api/users"></users>

@endsection

@section('scripts')
@include('adminlte::layouts.partials.scripts')
{!!Html::script('js/tables/moment-with-locales.min.js')!!}

@endsection

		
          
        