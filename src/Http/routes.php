<?php

/** @var LaraPress\Routing\Router $router */

$router->group(['as' => 'admin::', 'namespace' => 'PortOneFive\HowToVideos', 'prefix' => 'cms/wp-admin'],

    function () use ($router) {

        $router->adminGet('how-to-videos', [
            'as'       => 'how-to-videos.index',
            'icon'     => 'dashicons-format-video',
            'position' => 4.1,
            'uses'     => 'Http\Controllers\HowToVideosController@index',
        ]);

    });
