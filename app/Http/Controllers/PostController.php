<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\TemporaryUser;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index($slug, Request $request, Post $post, Category $category, TemporaryUser $temporaryUser){

        $postOne            = $post         -> where('slug', $slug)->where('status', 'PUBLISHED')->first();
        $categories         = $category     -> all('id', 'name', 'slug');
        $temporaryUs                = $temporaryUser -> where('user_ip', $_SERVER['REMOTE_ADDR'])->first()->toArray();

        return view('main.index', [
                'index'         => $postOne,
                'categories'    => $categories,
                'temporaryUs'   => ip2long($temporaryUs['user_ip']) ?? ''


            ]

        );
    }
}
