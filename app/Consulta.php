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
}
