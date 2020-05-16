<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductTag extends Model
{
    protected $fillable = [

        'product_id',
        'tag_id'

    ];

    protected $casts = [

    ];

    protected $table = 'product_tag';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];
}
