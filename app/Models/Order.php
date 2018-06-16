<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }

    public function products()
    {
        return $this->belongsToMany('App\Models\Product');
    }
}
