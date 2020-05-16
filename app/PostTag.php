<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class PostTag extends Model
{
    protected $fillable = [

        'post_id',
        'tag_id'

    ];

    protected $casts = [

    ];

    protected $table = 'post_tag';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];
}
