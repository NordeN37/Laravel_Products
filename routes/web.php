<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/robots.txt', function () {
    return response(setting('site.robots', ''))->header('Content-Type', 'text/plain');
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();

    Route::match(['get', 'post'],'/VoyagerS/{id}',                              ['uses' => 'AdminProductController@VoyagerUpdate',  'as' => 'update']);
    Route::match(['get', 'post'],'/VoyagerStore',                           ['uses' => 'AdminProductController@VoyagerStore',  'as' => 'store']);

    Route::match(['get', 'post'], 'export',                 ['as' => 'export',               'uses' => 'CsvController@export']);
    Route::post('import',                                   ['as' => 'import',               'uses' => 'CsvController@import']);
    Route::match(['get', 'post'], 'importExportView',       ['as' => 'importExportView',     'uses' => 'CsvController@importExportView']);
});

Route::get('/',                                             ['as' => 'index',           'uses' => 'PageController@index']);
Route::get('/post/{slug}',                                  ['as' => 'post',            'uses' => 'PostController@index']);
Route::get('/category/{slug}',                              ['as' => 'category',        'uses' => 'CategoryController@index']);

/* Sitemap */
Route::get('/sitemap.xml',          'SitemapController@index');
Route::get('/sitemap',              'SitemapController@index');
Route::get('/sitemap/pages',        'SitemapController@pages');
Route::get('/sitemap/posts',        'SitemapController@posts');
Route::get('/sitemap/categories',   'SitemapController@categories');
