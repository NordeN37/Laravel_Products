<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataRow;
use TCG\Voyager\Models\DataType;
use TCG\Voyager\Models\Menu;
use TCG\Voyager\Models\MenuItem;
use TCG\Voyager\Models\Page;
use TCG\Voyager\Models\Permission;
use TCG\Voyager\Models\Post;

class PostTableSeeder extends Seeder
{
    public function run()
    {
        Post::firstOrCreate([
            'author_id'         => '1',
            'category_id'       => '1',
            'title'             => 'Пост 1',
            'seo_title'         => 'пост 1',
            'excerpt'           => 'Пост 1',
            'body'              => 'Текст',
            'image'             =>  null,
            'slug'              => 'post1',
            'meta_description'  => 'post 1',
            'meta_keywords'     => '1',
            'status'            => 'PENDING',
            'featured'          => false,
            'views'             => 1,
            'multi_images'      => null,
            'blockquote'        => '<p>много текста</p>',
            'youtube'           => null,
            'iframe'            => null,
            'preview'           => 'IMAGE',
            'result'            => null,
            'original_link'     => null,
            'allow_comments'    => true,
            'activate_at'       => null,
            'event_start'       => null,
            'created_at'        => now(),
            'updated_at'        => now(),
            'searchtext'        => null
        ]);
    }
}
