<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TemporaryUser;

class TemporaryController extends Controller
{
    public function index(){
        $temporaryUser = new \App\TemporaryUser;
        if(!empty($_SERVER['REMOTE_ADDR'])){
            $userIp = $_SERVER['REMOTE_ADDR'];
            $temporaryUser->createUserIp($userIp);
        }
    }
}
