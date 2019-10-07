<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'order_details';

    protected $fillable = ['order_id','product_id', 'price', 'quantity'];

    public $timestamps = false;

    // for orders
    public function Orders()
    {
        return $this->belongsTo('App\Orders');
    }

    // for products
    public function products()
    {
        return $this->belongsTo('App\Product');
    }
}
