<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TemporaryUser extends Model
{
    protected $table        = 'temporary_users';

    protected $fillable = [
        'id',
        'user_ip'
    ];
}
