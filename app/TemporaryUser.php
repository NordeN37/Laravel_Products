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

    public function createUserIp($userIp){
        //Записываем данные о пользователе


        $products = $this->firstOrNew(
            [
                'user_ip'               => $userIp
            ]
        );

        $products -> save();

    }

}
