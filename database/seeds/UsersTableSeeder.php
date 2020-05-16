<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use TCG\Voyager\Models\Role;
use TCG\Voyager\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->delete();

        DB::table('users')->insert([
            'id' => 1,
            'name' => 'Admin',
            'email' => 'admin@involta.ru',
            'email_verified_at' => 'now()',
            'password' => Hash::make(('admin@involta.ru')),
            'remember_token' => 'uLFJ5NR0dR70NgOH4LuNgQlNa2yCOQfbS3puPC8IMphUM9u8lsSs1eC4Be3m',
            'created_at' => 'now()',
            'updated_at' => 'now()',
            'avatar' => 'users/November2019/uuBBIBER63lKrAcbz1v3.jpg',
            'role_id' => 1,
            'settings' => '{"locale":"ru"}',

        ]);

        DB::table('user_roles')->insert([
            'user_id'       => '1',
            'role_id'       => '1',
        ]);

    }
}
