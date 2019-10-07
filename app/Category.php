<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = ['id','name','image','slug'];
//
    public $timestamps = true;

    public function subcategories()
    {
        return $this->hasMany('App\SubCategory');
    }

    public function product()
    {
        return $this->hasMany('App\Product', 'category_id');
    }

}
