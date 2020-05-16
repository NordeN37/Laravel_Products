<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use App\Post;
use App\Category;
use Carbon\Carbon;


class SitemapController extends Controller
{
    public function index(){
        $on_page        = setting('site.sitemapLinks', 500);

        $post               = Post::where('status', 'PUBLISHED')->orderBy('updated_at', 'desc');
        $posts_count        = ($post->count() > 0 && $post->count() != $on_page ) ? (int) ( $post->count() / $on_page ) +1 : 0;
        $post               = $post->first();
        $page               = Page::where('status', 'ACTIVE')->orderBy('updated_at', 'desc');
        $pages_count        = ($page->count() > 0 && $page->count() != $on_page ) ? (int) ( $page->count() / $on_page ) +1 : 0;
        $page               = $page->first();
        $category           = Category::where('status', 'PUBLISHED')->orderBy('updated_at', 'desc');
        $categories_count   = ($category->count() > 0 && $category->count() != $on_page ) ? (int) ( $category->count() / $on_page ) +1 : 0;
        $category           = $category->first();



        return response()->view('sitemap.index', [

            'post'              => $post,
            'posts_count'       => $posts_count,
            'page'              => $page,
            'pages_count'       => $pages_count,
            'category'          => $category,
            'categories_count'  => $categories_count,

        ])->header('Content-Type', 'text/xml');
    }

    public function pages(Request $request){

        $page       = ($request->get('p') != '') ? $request->get('p') : 1;
        $on_page    = setting('site.sitemapLinks', 500);

        $pages = Page::where('status', 'ACTIVE')->orderBy('updated_at', 'desc')->whereNotIn('id', [setting('site.mainPageId', 1)])
            ->offset($on_page*$page - $on_page)
            ->limit($on_page)
            ->get();
        return response()->view('sitemap.pages', [
            'pages' => $pages,
        ])->header('Content-Type', 'text/xml');
    }

    public function posts(Request $request){

        $page       = ($request->get('p') != '') ? $request->get('p') : 1;
        $on_page    = setting('site.sitemapLinks', 500);

        $posts = Post::where('status', 'PUBLISHED')->orderBy('updated_at', 'desc')
            ->offset($on_page*$page - $on_page)
            ->limit($on_page)
            ->get();

        return response()->view('sitemap.posts', [
            'posts' => $posts,
        ])->header('Content-Type', 'text/xml');
    }

    public function categories(Request $request){

        $page       = ($request->get('p') != '') ? $request->get('p') : 1;
        $on_page    = setting('site.sitemapLinks', 500);

        $categories = Category::where('status', 'PUBLISHED')->orderBy('updated_at', 'desc')
            ->offset($on_page*$page - $on_page)
            ->limit($on_page)
            ->get();
        return response()->view('sitemap.categories', [
            'categories' => $categories,
        ])->header('Content-Type', 'text/xml');
    }
}
