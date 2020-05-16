<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostToCategory extends Model
{
    protected $fillable = [
        'post_id',
        'category_id'
    ];

    protected $casts = [

    ];

    protected $table = 'posts_categories';

    public function posts(){
        return $this->belongsTo('App\Post', 'post_id', 'id');
    }

    public function category(){
        return $this->belongsTo('App\Category', 'category_id', 'id');
    }
}
