<?php

use App\Admin\Controllers\AdminPostController;
use App\Admin\Controllers\HomeController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Admin::routes();

$args = [
    'prefix'        => config('admin.route.prefix'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
];
Route::group($args, function (Router $router) {
    $router->get('/', [HomeController::class, 'index'])->name('home');
    $router->resource('posts', AdminPostController::class);
});
