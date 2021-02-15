<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'stock', 'unit_price', 'shop_id'];

    // TODO: Relaciones
    public function images()
    {
        return $this->hasMany('App\ProductImage');
    }

    public function infos()
    {
        return $this->hasMany('App\ProductInfo');
    }

    public function carts()
    {
        return $this->belongsToMany('App\Cart', 'cart_products')->withPivot('cart_id', 'quantity', 'unit_price');
    }

    public function sales()
    {
        return $this->belongsToMany('App\Sale', 'sale_products')->withPivot('sale_id', 'quantity', 'unit_price');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function top()
    {
        return $this->hasOne('App\ProductTop');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category')->withPivot('category_id');
    }
}