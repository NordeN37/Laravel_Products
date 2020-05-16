<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index($slug, Request $request, Category $category, Post $post){

        $categotyId                 = $category -> where('slug', $slug)->first();
        $postAll                    = $post     -> where('category_id', $categotyId->id)->where('status', 'PUBLISHED')->get();
        $categoriesNavbar           = $category -> all('id', 'name', 'slug');

        return view('main.index', [
                'index'             => $categotyId,
                'postAll'           => $postAll,
                'categories'        => $categoriesNavbar
            ]

        );
    }
}
