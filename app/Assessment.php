<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    protected $fillable = [
        'id',
        'user_id',
        'products_id',
        'assessment',
    ];
}
