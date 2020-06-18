<?php

namespace App\Http\Controllers;

use App\Page;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\OrderShipped;
use App\Mail\MailNewsletter;
use Illuminate\Support\Facades\Mail;
use App\Category;

class MailController extends Controller
{
    public function index(){

        return view('vendor/voyager/mail/index');
    }

    public function sendingAdmin(Request $request){

        $objMaleBoughts = new \stdClass();
        $objMaleBoughts -> email            = $request->email;
        $objMaleBoughts -> body             = $request->body;
        $objMaleBoughts -> shablon          = $request->shablon;


        Mail::to($request->email)->send(new MailNewsletter($objMaleBoughts));
        return back();
    }

    public function send($bought)
    {
        $objMaleBoughts = new \stdClass();
        $objMaleBoughts -> order_number     = $bought->order_number;
        $objMaleBoughts -> phone            = $bought->phone;
        $objMaleBoughts -> name             = $bought->name;
        $objMaleBoughts -> email            = $bought->email;
        $objMaleBoughts -> sizes            = $bought->size;
        $objMaleBoughts -> price            = $bought->price;
        $objMaleBoughts -> country          = $bought->country;
        $objMaleBoughts -> city             = $bought->city;
        $objMaleBoughts -> street           = $bought->street;
        $objMaleBoughts -> home             = $bought->home;
        $objMaleBoughts -> flat             = $bought->flat;

        Mail::to($bought->email)->send(new OrderShipped($objMaleBoughts));
        return back();
    }
}
