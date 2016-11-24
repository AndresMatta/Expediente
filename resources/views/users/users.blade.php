@extends('adminlte::layouts.app')

@section('htmlheader_title')
	Usuarios
@endsection

@section('htmlheader')
    @include('adminlte::layouts.partials.htmlheader')
    {!!Html::style('css/tables/bootstrap.min.css')!!}
	{!!Html::style('css/tables/sweetalert.min.css')!!}
	{!!Html::style('css/tables/styles.css')!!}
@endsection


@section('main-content')

@include('users.users-list')

@endsection

@section('scripts')
@include('adminlte::layouts.partials.scripts')

{!!Html::script('js/tables/moment-with-locales.min.js')!!}
{!!Html::script('js/tables/sweetalert.min.js')!!}
{!!Html::script('js/tables/vue.js')!!}
{!!Html::script('js/tables/vue-resource.min.js')!!}
{!!Html::script('js/tables/vue-table.js')!!}
{!!Html::script('js/tables/users_table.js')!!}

@endsection

		
          
        