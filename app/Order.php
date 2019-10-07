<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    protected  $fillable = ['id','name', 'user_id', 'telephone', 'address', 'total', 'status'];

    public $timestamps = true;

    // for order_details
    public function OrderDetails()
    {
        return $this->hasMany('App\OrderDetail');
    }

    // for users

    public function User()
    {
        return $this->belongsTo('App\User');
    }
}
