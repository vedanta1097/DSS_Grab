<?php

namespace App;

class Crips extends Model
{
    public function criteria() 
    {
    	return $this->belongsTo('App\Criteria');
    }

    public function perhitungan()
    {
    	return $this->hasMany('App\Perhitungan');
    }
}
