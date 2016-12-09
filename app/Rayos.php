<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rayos extends Model
{
    //
    protected $table = "consulta_rx";

    protected $fillable = ['rx', 'consulta_id'];

    public function consulta()
    {
        return $this->belongsTo('App\Consulta');
    }
}
