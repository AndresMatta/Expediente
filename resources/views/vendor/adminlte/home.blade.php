@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.home') }}
@endsection


@section('main-content')

		<div class="row">
			<!-- ./col -->
			<div class="col-md-4">
          		<div class="small-box bg-blue">
            		<div class="inner">
              			<h3>44</h3>
              			<p>Usuarios Registrados</p>
            			</div>
            		<div class="icon">
              			<i class="fa fa-user" aria-hidden="true"></i>
            		</div>
            	<a href="#" class="small-box-footer">Ver Lista <i class="fa fa-arrow-circle-right"></i></a>
          		</div>
			</div>
			<!-- ./col -->
			<div class="col-md-4">
          		<div class="small-box bg-green">
            		<div class="inner">
              			<h3>127</h3>
              			<p>Consultas Diarias</p>
            			</div>
            		<div class="icon">
              			<i class="fa fa-ambulance" aria-hidden="true"></i>
            		</div>
            	<a href="#" class="small-box-footer">Ver Historial <i class="fa fa-arrow-circle-right"></i></a>
          		</div>
			</div>
			<div class="col-md-4">
          		<div class="small-box bg-yellow">
            		<div class="inner">
              			<h3>33</h3>
              			<p>Convenios Activos</p>
            			</div>
            		<div class="icon">
              			<i class="fa fa-building" aria-hidden="true"></i>
            		</div>
            	<a href="#" class="small-box-footer">Ver Lista <i class="fa fa-arrow-circle-right"></i></a>
          		</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="box box-info">
					  <div class="box-header with-border">
					    <h3 class="box-title">Pacientes de Empresa</h3>
					    <div class="box-tools pull-right">
					      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
					    </div><!-- /.box-tools -->
					  </div><!-- /.box-header -->
					  <div class="box-body">
					    <canvas id="empresa" width="100" height="70"></canvas>
					  </div><!-- /.box-body -->
					</div><!-- /.box -->
			</div>
			<div class="col-md-4">
				<div class="box box-info">
					  <div class="box-header with-border">
					    <h3 class="box-title">Pacientes Anuales</h3>
					    <div class="box-tools pull-right">
					      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
					    </div><!-- /.box-tools -->
					  </div><!-- /.box-header -->
					  <div class="box-body">
					    <canvas id="pac_anuales" width="100" height="70"></canvas>
					  </div><!-- /.box-body -->
					</div><!-- /.box -->
			</div>
			<div class="col-md-4">
				<div class="box box-info">
					  <div class="box-header with-border">
					    <h3 class="box-title">Pacientes Mensuales por Médico</h3>
					    <div class="box-tools pull-right">
					      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
					    </div><!-- /.box-tools -->
					  </div><!-- /.box-header -->
					  <div class="box-body">
					    <canvas id="mensuales_medico" width="100" height="70"></canvas>
					  </div><!-- /.box-body -->
					</div><!-- /.box -->
			</div>

		</div>
	</div>
@endsection
@section('scripts')
	@include('adminlte::layouts.partials.scripts')
	{!!Html::script('js/AdminCharts.js')!!}
@endsection

		
          
        