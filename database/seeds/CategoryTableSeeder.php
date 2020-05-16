<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataRow;
use TCG\Voyager\Models\DataType;
use TCG\Voyager\Models\Menu;
use TCG\Voyager\Models\MenuItem;
use TCG\Voyager\Models\Page;
use TCG\Voyager\Models\Permission;
use TCG\Voyager\Models\Post;
use TCG\Voyager\Models\Category;

class CategoryTableSeeder extends Seeder
{
    public function run()
    {
        Category::firstOrCreate([
            'parent_id' => null,
            'order' => 1,
            'name' => 'Иваново',
            'slug' => 'ivanovo',
            'in_main_page' => false,
            'meta_description' => 'Иваново',
            'meta_keywords' => 'Иваново',
            'seo_title' => 'Иваново',
            'image' => null,
            'status' => 'PUBLISHED',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
