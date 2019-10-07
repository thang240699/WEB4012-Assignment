<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $table = 'sub_categories';

    protected $fillable = ['id', 'category_id', 'sub_name', 'slug'];

    public $timestamps = false;

    public function category()
    {
        return $this->belongsTo('App\Category','category_id');
    }

    public function product()
    {
        return $this->belongsTo('App\Product', 'category_id');
    }
}
