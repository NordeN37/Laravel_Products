<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Tag extends Model
{
    protected $fillable = [

        'id',
        'slug',
        'title',
        'weight',
        'description'

    ];

    protected $casts = [

    ];



    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    public function posts(){
        return $this->hasManyThrough(
            'App\Post', 'App\PostTag',
            'tag_id', 'id', 'id', 'post_id'
        );
    }

    public function path(){
        return '/tag/'.$this->slug;
    }

    public function getTableColumns() {
        return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
    }
}
