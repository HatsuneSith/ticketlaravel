<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class incidencias extends Model
{
    protected $table = "incidencias";

    public function respuestas()
    {
        return $this->hasMany('App\respuestas');
    }

    public function User()
    {
        return $this->belongsTo('App\User');
    }}
