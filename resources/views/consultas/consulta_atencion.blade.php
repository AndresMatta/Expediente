@extends('adminlte::layouts.app')

@section('htmlheader_title')
	Atención Médica
@endsection

@section('main-content')


<my-atencion id="{{ $id }}"></my-atencion>

@endsection

@section('scripts')

@include('adminlte::layouts.partials.scripts')

@endsection