<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    public function user() {
        $this->belongsTo('App/User');
    }
}
