<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receiving extends Model
{
    public function user() {
        $this->belongsTo('App/User');
    }

    public function supplier() {
    	$this->belongsTo('App/Supplier');
    }
}
