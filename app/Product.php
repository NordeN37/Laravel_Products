<?php

namespace App;

use TCG\Voyager\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use TCG\Voyager\Traits\Resizable;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use File;

class Product extends Model
{
    use Resizable;
    use Translatable;


    protected $translatable = ['title', 'body', 'slug'];

    protected $fillable = [
        'id',
        'author_id',
        'name',
        'price',
        'sizes',
        'allow_sale',
        'sale',
        'assessment',
        'category_id',
        'title',
        'seo_title',
        'body',
        'image_one',
        'image_two',
        'image_three',
        'image_four',
        'slug',
        'meta_description',
        'meta_keywords',
        'status',
        'views',
        'youtube',
        'iframe',
        'preview',
        'activate_at',
        'event_start',
        'created_at',
        'updated_at'
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


    public function tags()
    {
        return $this->belongsToMany('App\Tag');

    }


    public function categories(){
        return $this->belongsToMany('App\Category', 'posts_categories');
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function viewsFormated(){
        $views = $this->views;

        if($views > 100000){
            $views = floor($views / 100000).'M';
        }
        if($views > 1000){
            $views = floor($views / 1000).'K';
        }
        return $views;
    }

    public function path(){
        return '/products/'.$this->slug;
    }

    public function createdAtFormated(){
        $carbon = new Carbon($this->created_at, 'Europe/Moscow');
        $carbon->locale('ru');
        $return = $carbon->format('d').' '. $carbon->getTranslatedShortMonthName('Do MMMM').' '.$carbon->isoFormat('Y').' '.$carbon->isoFormat('HH:mm');

        if($carbon->format('Y-m-d') == date('Y-m-d'))
            $return = __('today').' '.$carbon->isoFormat('HH:mm');

        if($carbon->format('Y-m-d') == date('Y-m-d', strtotime(date('Y-m-d').' -1 day')))
            $return = __('yestoday').' '.$carbon->isoFormat('HH:mm');

        return $return;
    }

    public function datetimeFormated(){
        $carbon = new Carbon($this->created_at, 'Europe/Moscow');
        $carbon->locale('ru');
        return $carbon->format('Y-m-d').'T'.$carbon->isoFormat('HH:mm');
    }

    public function datetimeToRFC822(){
        $carbon = new Carbon($this->created_at, 'Europe/Moscow');
        $carbon->locale('ru');
        return $carbon->toRfc2822String();
    }

    public function CreateProducts($productes){

        $products = $this->firstOrNew(
            [
                'slug'               => $productes['slug']
            ]
        );
        $products-> author_id           = $productes['author_id'];
        $products -> slug               = $productes['slug'];
        $products -> name               = $productes['name'];
        $products -> price              = $productes['price'];
        $products -> sizes              = json_encode($productes['sizes']);
        $products -> allow_sale         = $productes['allow_sale'];
        $products -> sale               = $productes['sale'];
        $products -> assessment         = $productes['assessment'];
        $products -> category_id        = $productes['category_id'];
        $products -> title              = $productes['title'];
        $products -> seo_title          = $productes['seo_title'];
        $products -> image_one          = $productes['image_one'];
        $products -> image_two          = $productes['image_two'];
        $products -> image_three        = $productes['image_three'];
        $products -> image_four         = $productes['image_four'];
        $products -> meta_description   = $productes['meta_description'];
        $products -> meta_keywords      = $productes['meta_keywords'];
        $products -> status             = $productes['status'];
        $products -> views              = $productes['views'];
        $products -> youtube            = $productes['youtube'];
        $products -> iframe             = $productes['iframe'];
        $products -> preview            = $productes['preview'];
        $products -> activate_at        = $productes['activate_at'];
        $products -> event_start        = $productes['event_start'];
        $products -> save();
    }

}
