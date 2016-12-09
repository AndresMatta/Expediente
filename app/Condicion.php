<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Condicion extends Model
{
   protected $table = "consulta_condicion";

    protected $fillable = ['sintomas', 'observaciones', 'dx_inicial', 'consulta_id'];

    public function consulta()
    {
        return $this->belongsTo('App\Consulta');
    }
}
