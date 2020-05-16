<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductToCategory extends Model
{
    protected $fillable = [
        'product_id',
        'category_id'
    ];

    protected $casts = [

    ];
    
    public $timestamps = false;


    protected $table = 'products_categories';

    public function product(){
        return $this->belongsTo('App\Product', 'product_id', 'id');
    }

    public function category(){
        return $this->belongsTo('App\Category', 'category_id', 'id');
    }
}
