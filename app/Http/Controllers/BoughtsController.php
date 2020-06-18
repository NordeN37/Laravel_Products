<?php

namespace App\Http\Controllers;

use App\Category;
use App\Page;
use App\Post;
use App\Bought;
use App\Http\Controllers\MailController;
use Illuminate\Http\Request;

class BoughtsController extends Controller
{
    public function index(Page $pages, Category $category, Post $post){

        $categories         = $category     -> all('id', 'name', 'slug');

        return view('main.zakaz.index',[
            'categories'    => $categories
        ]);
    }
    public function createZakaz(Request $request, MailController $mailController){

        $mailController->send($request);
        return redirect()->route('index');
    }
}
