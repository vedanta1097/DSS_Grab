<?php

namespace App;

class Alternative extends Model
{
    public function perhitungan()
    {
    	return $this->hasMany('App\Perhitungan');
    }
}
