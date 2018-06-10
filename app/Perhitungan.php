<?php

namespace App;

class Perhitungan extends Model
{
    public function alternative()
    {
    	return $this->belongsTo('App\Alternative');
    }

    public function criteria()
    {
    	return $this->belongsTo('App\Criteria');
    }

    public function crips()
    {
    	return $this->belongsTo('App\Crips');
    }
}
