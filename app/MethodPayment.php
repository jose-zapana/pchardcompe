<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MethodPayment extends Model
{
    protected $fillable = ['name', 'image', 'shop_id'];

    // TODO: relaciones
    public function shop()
    {
        $this->belongsTo('App\Shop');
    }

    public function sales()
    {
        $this->hasMany('App\Sale');
    }
}
