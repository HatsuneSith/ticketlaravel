<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tabla3 extends Model
{
    protected $table = "tabla3";


    public function tabla1()
    {
        return $this->hasMany('App\tabla1');
    }
}
