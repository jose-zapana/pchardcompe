<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['user_id', 'phone'];

    // TODO:Relaciones
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function addresses()
    {
        return $this->hasMany('App\CustomerAddress');
    }

    public function carts()
    {
        return $this->hasMany('App\Cart');
    }
}
