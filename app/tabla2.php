<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tabla2 extends Model
{
    protected $table = "tabla2";

    public function tabla1()
    {
        return $this->belongsTo('App\tabla1');
    }
}
