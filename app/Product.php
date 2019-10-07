<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static orderBy(string $string, string $string1)
 */
class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['id', 'category_id', 'sub_category_id', 'name', 'price', 'image', 'description', 'quantity', 'sale', 'slug'];
    public $timestamps = true;

    public function category()
    {
        return $this->belongsTo('App\Category','category_id');
    }

    public function subcategory()
    {
        return $this->belongsTo('App\SubCategory','sub_category_id');
    }

    public function rating()
    {
        return $this->hasMany('App\Rating');
    }

    public function orderdetail()
    {
        return $this->hasMany('App\OrderDetail');
    }
}
