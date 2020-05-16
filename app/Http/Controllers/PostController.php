<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index($slug, Request $request, Post $post, Category $category){

        $postOne            = $post         -> where('slug', $slug)->where('status', 'PUBLISHED')->first();
        $categories         = $category     -> all('id', 'name', 'slug');

        return view('main.index', [
                'index'         => $postOne,
                'categories'    => $categories
            ]

        );
    }
}
