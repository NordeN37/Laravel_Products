<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Resizable;


class Category extends Model
{
    use Resizable;

    protected $fillable = [
        'id',
        'parent_id',
        'order',
        'name',
        'slug',
        'body',
        'image',
        'meta_description',
        'meta_keywords',
        'seo_title',
        'excerpt',
        'template'
    ];

    protected $casts = [

    ];

    protected $table = 'categories';

    public function posts(){
        return $this->hasManyThrough(
            'App\Post', 'App\PostToCategory',
            'category_id', 'id', 'id', 'post_id'
        );
    }

    public function path(){
        return '/category/'.$this->slug;
    }
    public function getCategory($id) {

        $category   = new Category();
        return $category->where('id',$id)->get()[0];

    }

    public function getParentCategories($id, &$data, $current = false, &$level){

        $сategory   = $this->getCategory($id);
        if(!$current || ($current && $current != $id))
            $data[$level]     = $сategory;

        if(!is_null($сategory->parent_id)){
            $level++;
            if( count($data) > 10) return $data; //Если наебенели

            $this->getParentCategories($сategory->parent_id, $data, $current, $level);
        }

        return $data;

    }

    public function getChilderenCategories($id) {

        $category   = new Category();
        return $category->where('parent_id',$id);

    }

    public function getTableColumns() {
        return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
    }

    public function getPostCategory($slug){
        $post = $this->where('categories.slug', $slug)
                ->join('posts', 'categories.id', '=', 'posts.category_id');

        return $post;

    }
}
