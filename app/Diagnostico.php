<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diagnostico extends Model
{
    //
    protected $table = "consulta_diagnostico";

    protected $fillable = ['resultados', 'indicaciones', 'dx', 'consulta_id'];

    public function consulta()
    {
        return $this->belongsTo('App\Consulta');
    }
}
