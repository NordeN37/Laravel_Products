<?php

namespace App\Http\Controllers;

use App\Page;
use App\Post;
use App\Category;
use Illuminate\Http\Request;
use TCG\Voyager\Traits\Resizable;

class PageController extends Controller
{

    public function index(Request $request, Page $pages, Category $category, Post $post){

        $page               = $pages        -> where('id', setting('site.mainPageId', 1))->firstOrFail();
        $categories         = $category     -> all('id', 'name', 'slug');
        $postAll            = $post         -> where('status', 'PUBLISHED')->get();

        return view('main.index', [
                'index'         => $page,
                'postAll'       => $postAll,
                'categories'    => $categories
            ]

        );
    }
}
