@extends('adminlte::layouts.app')

@section('htmlheader_title')
	Consultas Activas
@endsection

@section('main-content')

<my-pendientes></my-pendientes>

@endsection

@section('scripts')

@include('adminlte::layouts.partials.scripts')

@endsection