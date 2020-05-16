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
    public function VoyagerUpdate(Request $request, $id){
        $request->sizes = json_encode($request->sizes);

                    //перебираем и сохраняем
                    $products = $this->firstOrNew(
                        [
                            'date'          => $request['date'],
                            'ip'            => $request['ip']
                        ]
                    );
                    $products -> subnet_id     = $request['subnet_id'];
                    $products -> device        = $request['device'];
                    $products -> user_agent    = $request['user_agent'];
                    $products -> save();

        return redirect()->route('voyager.products.index');

    }

    public function VoyagerStore(Request $request, Product $product)
    {
        $product->CreateProducts($request);

        return redirect()->route('voyager.products.index');
    }
}
