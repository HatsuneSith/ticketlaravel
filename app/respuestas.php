<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class respuestas extends Model
{
    protected $table = "respuestas";

    public function incidencias()
    {
        return $this->belongsTo('App\incidencias');
    }

    public function User()
    {
        return $this->belongsTo('App\User');
    }
}
