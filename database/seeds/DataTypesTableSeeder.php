<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataType;

class DataTypesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $dataType = $this->dataType('slug', 'users');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'users',
                'display_name_singular' => __('voyager::seeders.data_types.user.singular'),
                'display_name_plural'   => __('voyager::seeders.data_types.user.plural'),
                'icon'                  => 'voyager-person',
                'model_name'            => 'TCG\\Voyager\\Models\\User',
                'policy_name'           => 'TCG\\Voyager\\Policies\\UserPolicy',
                'controller'            => 'TCG\\Voyager\\Http\\Controllers\\VoyagerUserController',
                'generate_permissions'  => 1,
                'description'           => '',
                'details'               => [
                    "order_column"          => null,
                    "order_display_column"  => null,
                    "order_direction"       => "desc",
                    "default_search_key"    => null,
                    "scope"                 => null
                ]
            ])->save();
        }

        $dataType = $this->dataType('slug', 'menus');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'menus',
                'display_name_singular' => __('voyager::seeders.data_types.menu.singular'),
                'display_name_plural'   => __('voyager::seeders.data_types.menu.plural'),
                'icon'                  => 'voyager-list',
                'model_name'            => 'TCG\\Voyager\\Models\\Menu',
                'controller'            => '',
                'generate_permissions'  => 1,
                'description'           => '',
            ])->save();
        }

        $dataType = $this->dataType('slug', 'roles');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'roles',
                'display_name_singular' => __('voyager::seeders.data_types.role.singular'),
                'display_name_plural'   => __('voyager::seeders.data_types.role.plural'),
                'icon'                  => 'voyager-lock',
                'model_name'            => 'TCG\\Voyager\\Models\\Role',
                'controller'            => 'TCG\\Voyager\\Http\\Controllers\\VoyagerRoleController',
                'generate_permissions'  => 1,
                'description'           => '',
            ])->save();
        }
        //Page
        $dataType = $this->dataType('slug', 'pages');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'pages',
                'display_name_singular' => 'Page',
                'display_name_plural'   => 'Pages',
                'icon'                  => 'voyager-file-text',
                'model_name'            => 'TCG\\Voyager\\Models\\Page',
                'controller'            => null,
                'generate_permissions'  => 1,
                'description'           => '',
                'details'               => [
                    "order_column"          => null,
                    "order_display_column"  => null,
                    "order_direction"       => "asc",
                    "default_search_key"    => "slug",
                    "scope"                 => null
                ]
            ])->save();
        }
            //Post
        $dataType = $this->dataType('slug', 'posts');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'posts',
                'display_name_singular' => 'Post',
                'display_name_plural'   => 'Posts',
                'icon'                  => 'voyager-news',
                'model_name'            => 'TCG\\Voyager\\Models\\Post',
                'controller'            => null,
                'generate_permissions'  => 1,
                'description'           => '',
                'details'               => [
                    "order_column"          => null,
                    "order_display_column"  => null,
                    "order_direction"       => "asc",
                    "default_search_key"    => null,
                    "scope"                 => null
                ]
            ])->save();
        }
        //Category
        $dataType = $this->dataType('slug', 'categories');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'categories',
                'display_name_singular' => 'Category',
                'display_name_plural'   => 'Categories',
                'icon'                  => 'voyager-categories',
                'model_name'            => 'TCG\\Voyager\\Models\\Category',
                'controller'            => null,
                'generate_permissions'  => 1,
                'description'           => '',
                'details'               => [
                    "order_column"          => null,
                    "order_display_column"  => null,
                    "order_direction"       => "asc",
                    "default_search_key"    => null,
                    "scope"                 => "published"
                ]
            ])->save();
        }
        //Tag
        $dataType = $this->dataType('slug', 'tags');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'tags',
                'display_name_singular' => 'Tag',
                'display_name_plural'   => 'Tags',
                'icon'                  => 'voyager-tag',
                'model_name'            => 'App\Tag',
                'controller'            => null,
                'generate_permissions'  => 1,
                'description'           => '',
                'details'               => [
                    "order_column"          => null,
                    "order_display_column"  => null,
                    "order_direction"       => "asc",
                    "default_search_key"    => null,
                    "scope"                 => "published"
                ]
            ])->save();
        }

        //CSV
        $dataType = $this->dataType('slug', 'csv');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'csv',
                'display_name_singular' => 'CSV',
                'display_name_plural'   => 'CSV',
                'icon'                  => 'voyager-news',
                'model_name'            => 'App\Csv',
                'controller'            => 'App\Imports\PostsImport',
                'generate_permissions'  => 1,
                'description'           => '',
                'details'               => [
                    "order_column"          => null,
                    "order_display_column"  => null,
                    "order_direction"       => "asc",
                    "default_search_key"    => null,
                    "scope"                 => "published"
                ]
            ])->save();
        }
        //PRODUCTS
        $dataType = $this->dataType('slug', 'products');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'products',
                'display_name_singular' => 'Product',
                'display_name_plural'   => 'Product',
                'icon'                  => 'voyager-bag',
                'model_name'            => 'App\Product',
                'controller'            => null,
                'generate_permissions'  => 1,
                'description'           => '',
                'details'               => [
                    "order_column"          => null,
                    "order_display_column"  => null,
                    "order_direction"       => "asc",
                    "default_search_key"    => null,
                    "scope"                 => "published"
                ]
            ])->save();
        }
    }


    /**
     * [dataType description].
     *
     * @param [type] $field [description]
     * @param [type] $for   [description]
     *
     * @return [type] [description]
     */
    protected function dataType($field, $for)
    {
        return DataType::firstOrNew([$field => $for]);
    }
}
