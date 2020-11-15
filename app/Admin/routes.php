<?php

use App\Admin\Controllers\AdminPostController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Admin::routes();

$args = [
    'prefix'        => config('admin.route.prefix'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
];
Route::group($args, function (Router $router) {
    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('posts', AdminPostController::class);
});
