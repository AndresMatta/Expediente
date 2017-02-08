<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    protected $table = "consultas";

    protected $fillable = ['ingreso', 'egreso', 'tipo','estado', 'paciente_id'];

    public function paciente()
    {
        return $this->belongsTo('App\Paciente');
    }

    public function condicion()
    {
        return $this->hasOne('App\Condicion');
    }

    public function plan()
    {
        return $this->hasOne('App\Plan');
    }

    public function signos()
    {
        return $this->hasOne('App\Signos');
    }

    public function laboratorios()
    {
        return $this->hasOne('App\Laboratorios');
    }

    public function rayos()
    {
        return $this->hasOne('App\Rayos');
    }

    public function diagnostico()
    {
        return $this->hasOne('App\Diagnostico');
    }

    public function referencias()
    {
        return $this->hasOne('App\Referencias');
    }
}
