<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'track_number', 'item_name', 'description', 'item_image', 'buying_price', 'selling_price', 'quantiy', 'type'
    ];
}
