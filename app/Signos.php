<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Signos extends Model
{
    protected $table = "consulta_signos";

    protected $fillable = ['presion_arterial', 'frecuencia_cardiaca', 'respiracion','temperatura', 'peso', 'consulta_id'];

    public function consulta()
    {
        return $this->belongsTo('App\Consulta');
    }
}
