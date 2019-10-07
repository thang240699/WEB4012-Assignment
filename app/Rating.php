<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table = 'ratings';
    protected $fillable = ['id', 'product_id', 'user_id', 'status'];
    public $timestamps = true;
}
