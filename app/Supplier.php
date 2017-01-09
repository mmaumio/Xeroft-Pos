<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    /**
    * The attributes that are mass assignable
    * 
    * $var array
    */

    protected $fillable = [
        'company_name', 'product_name', 'email', 'phone_number', 'address', 'avatar', 'city' , 'zip', 'account' 
    ];

}
