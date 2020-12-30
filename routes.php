<?php

use Illuminate\Routing\Router;

// 接口
Route::group([
    'prefix' => config('qihu.menu_prefix', 'menu'),
    'namespace' => 'Qihucms\Menu\Controllers\Api',
    'middleware' => ['api'],
    'as' => 'api.menu.'
], function (Router $router) {
    $router->get('menus', 'MenuController@index')->name('index');
});

// 后台管理
Route::group([
    'prefix' => config('admin.route.prefix') . '/menu',
    'namespace' => 'Qihucms\Menu\Controllers\Admin',
    'middleware' => config('admin.route.middleware'),
    'as' => 'admin.'
], function (Router $router) {
    $router->resource('menus', 'MenuController');
});