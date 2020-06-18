<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\TemporaryUser;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index($slug, Request $request, Category $category, Post $post, TemporaryUser $temporaryUser){

        $categotyId                 = $category -> where('slug', $slug)->first();
        $postAll                    = $post     -> where('category_id', $categotyId->id)->where('status', 'PUBLISHED')->get();
        $categoriesNavbar           = $category -> all('id', 'name', 'slug');
        $temporaryUs                = $temporaryUser -> where('user_ip', $_SERVER['REMOTE_ADDR'])->first()->toArray();

        return view('main.index', [
                'index'             => $categotyId,
                'postAll'           => $postAll,
                'categories'        => $categoriesNavbar,
                'temporaryUs'   => ip2long($temporaryUs['user_ip']) ?? ''


            ]

        );
    }
}
