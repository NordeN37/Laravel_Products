<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    protected $fillable = [
        'id',
        'user_id',
        'temporary_user_id',
        'products_id',
    ];
}
