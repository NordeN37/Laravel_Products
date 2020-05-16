<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bought extends Model
{
    protected $fillable = [
        'id',
        'users_id',
        'products_id',
        'sizes',
        'price',
        'paid',
        'shipped',
        'phone',
        'email',
        'country',
        'city',
        'street',
        'home',
        'flat',
    ];
}
