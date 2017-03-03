<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tabla1 extends Model
{
    protected $table = "tabla1";

    public function tabla2()
    {
        return $this->hasMany('App\tabla2');
    }

    public function tabla3()
    {
        return $this->belongsTo('App\tabla3');
    }
}
