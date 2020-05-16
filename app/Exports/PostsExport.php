<?php

namespace App\Exports;

use App\Post;
use Maatwebsite\Excel\Concerns\FromCollection;

class PostsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection(){

        $rows = Post::get([
                    'id',
                    'iframe',
                    'image',
                    'seo_title',
                    'meta_description',
                    'meta_keywords'
                ]);

        return $rows;
    }
}
