<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\User;
use App\TemporaryUser;
use App\Tag;
use App\Comment;
use App\Basket;
use App\Bought;
use App\Assessment;
use Illuminate\Http\Request;
use TCG\Voyager\Events\BreadAdded;
use TCG\Voyager\Facades\Voyager;

class AdminProductController extends Controller
{
    public function VoyagerUpdate(Request $request, $id, Product $product){


        $product->UpdateProducts($request, $id);

        return redirect()->route('voyager.products.index');

    }

    public function VoyagerStore(Request $request, Product $product)
    {

        $request->validate([
            'author_id' => 'required',
        ]);

        $product->CreateProducts($request);

        return redirect()->route('voyager.products.index');
    }
}
