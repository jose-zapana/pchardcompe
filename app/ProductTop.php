<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductTop extends Model
{
    protected $fillable = ['product_id', 'name-product', 'image-product'];

    // TODO: relaciones
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
