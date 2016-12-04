<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
     protected $table = "pacientes";

    protected $fillable = ['cedula', 'nombre', 'nacimiento', 'sexo', 'celular', 'telefono', 'direccion', 'padre', 'madre'];

     public function consultas()
    {
        return $this->hasMany('App\Consulta');
    }
}
