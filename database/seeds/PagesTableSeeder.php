<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataRow;
use TCG\Voyager\Models\DataType;
use TCG\Voyager\Models\Menu;
use TCG\Voyager\Models\MenuItem;
use TCG\Voyager\Models\Page;
use TCG\Voyager\Models\Permission;

class PagesTableSeeder extends Seeder
{
    public function run()
    {
        Page::firstOrCreate([
            'author_id' => '1',
            'title' => 'Главная',
            'excerpt' => null,
            'body' => null,
            'image' => null,
            'slug' => 'glavnaya',
            'meta_description' => null,
            'meta_keywords' => null,
            'status' => 'INACTIVE',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
