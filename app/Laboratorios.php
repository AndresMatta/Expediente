<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laboratorios extends Model
{
    //
    protected $table = "consulta_lab";

    protected $fillable = ['lab', 'consulta_id'];

    public function consulta()
    {
        return $this->belongsTo('App\Consulta');
    }
}
