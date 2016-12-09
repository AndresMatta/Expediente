<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Referencias extends Model
{
    //
     protected $table = "consulta_referencia";

    protected $fillable = ['referencia', 'consulta_id'];

    public function consulta()
    {
        return $this->belongsTo('App\Consulta');
    }
}
