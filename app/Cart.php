<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['total', 'customer_id', 'shop_id', 'state'];

    // TODO: Relaciones
    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    public function shop()
    {
        return $this->belongsTo('App\Shop');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product', 'cart_products')->withPivot('product_id', 'quantity', 'unit_price');
    }

    public function sale()
    {
        return $this->hasOne('App\Sale');
    }
}
