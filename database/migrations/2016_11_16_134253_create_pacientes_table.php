<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cedula')->unique();
            $table->string('nombre');
            $table->date('nacimiento');
            $table->string('sexo');
            $table->string('celular');
            $table->string('telefono');
            $table->string('direccion', 500);
            $table->string('padre');
            $table->string('madre');
            $table->timestamps();
        });

        Schema::create('consultas', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha');
            $table->time('ingreso');
            $table->time('egreso');
            $table->string('tipo');
            $table->timestamps();
            $table->integer('paciente_id')->unsigned();
            $table->foreign('paciente_id')->references('id')->on('pacientes');
        });

        Schema::create('consulta_signos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('presion_arterial');
            $table->string('frecuencia_cardiaca');
            $table->string('respiracion');
            $table->string('temperatura');
            $table->string('peso');
            $table->string('talla');
            $table->timestamps();
            $table->integer('consulta_id')->unsigned();
            $table->foreign('consulta_id')->references('id')->on('consultas');
        });
    

        Schema::create('consulta_condicion', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sintomas');
            $table->string('observaciones');
            $table->string('dx_inicial');
            $table->timestamps();
            $table->integer('consulta_id')->unsigned();
            $table->foreign('consulta_id')->references('id')->on('consultas');
        });

    Schema::create('consulta_plan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tratamiento');
            $table->timestamps();
            $table->integer('consulta_id')->unsigned();
            $table->foreign('consulta_id')->references('id')->on('consultas');
        });

    Schema::create('consulta_lab', function (Blueprint $table) {
            $table->increments('id');
            $table->string('lab');
            $table->timestamps();
            $table->integer('consulta_id')->unsigned();
            $table->foreign('consulta_id')->references('id')->on('consultas');
        });

    Schema::create('consulta_rx', function (Blueprint $table) {
            $table->increments('id');
            $table->string('rx');
            $table->timestamps();
            $table->integer('consulta_id')->unsigned();
            $table->foreign('consulta_id')->references('id')->on('consultas');
        });

    Schema::create('consulta_referencia', function (Blueprint $table) {
            $table->increments('id');
            $table->string('referencia');
            $table->timestamps();
            $table->integer('consulta_id')->unsigned();
            $table->foreign('consulta_id')->references('id')->on('consultas');
        });

    Schema::create('consulta_diagnostico', function (Blueprint $table) {
            $table->increments('id');
            $table->string('resultados');
            $table->string('dx');
            $table->string('indicaciones');
            $table->timestamps();
            $table->integer('consulta_id')->unsigned();
            $table->foreign('consulta_id')->references('id')->on('consultas');
        });

    Schema::create('laboratorios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('lab');
            $table->string('indicacion');
            $table->timestamps();
            $table->integer('consulta_id')->unsigned();
            $table->foreign('consulta_id')->references('id')->on('consultas');
        });

    Schema::create('rayos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('rx');
            $table->string('indicacion');
            $table->timestamps();
            $table->integer('consulta_id')->unsigned();
            $table->foreign('consulta_id')->references('id')->on('consultas');
        });
    

    Schema::create('diagnosticos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('dx');
            $table->timestamps();
            $table->integer('consulta_id')->unsigned();
            $table->foreign('consulta_id')->references('id')->on('consultas');
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
