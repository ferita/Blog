<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function orders()
    {
        return $this->belongsToMany('App\Models\Order');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
