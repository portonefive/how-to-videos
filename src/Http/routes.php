<?php

/** @var LaraPress\Routing\Router $router */

$router->group(['as' => 'admin::', 'namespace' => 'PortOneFive\HowToVideos'], function () use ($router) {
    $router->adminGet(config('how-to-videos.htv_admin_menu_route'), [
        'as'          => 'how-to-videos.index',
        'icon'        => 'dashicons-format-video',
        'position'    => config('how-to-videos.htv_admin_menu_position'),
        'uses'        => 'Http\Controllers\HowToVideosController@index',
        'parent_slug' => config('how-to-videos.htv_admin_menu_parent_slug'),
    ]);
});
