<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('admin.home');
    $router->resource('/user',UserControlle::class);
    $router->resource('/ins',InsControler::class);
    $router->resource('/major', MajorController::class);
    $router->resource('/co', CourseController::class);

});
