@extends('adminlte::layouts.app')

@section('htmlheader_title')
	Atención Médica
@endsection

@section('main-content')

<p>{{ $id }}</p>
<my-atencion></my-atencion>

@endsection

@section('scripts')

@include('adminlte::layouts.partials.scripts')

@endsection