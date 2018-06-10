<?php

namespace App;

class Criteria extends Model
{
    public function crips()
    {
    	return $this->hasMany('App\Crips');
    }

    public function perhitungan()
    {
    	return $this->hasMany('App\Perhitungan');
    }
}
