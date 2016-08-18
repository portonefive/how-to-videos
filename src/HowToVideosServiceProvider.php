<?php

namespace PortOneFive\HowToVideos;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

class HowToVideosServiceProvider extends ServiceProvider
{
    /**
     * Register any other events for your application.
     *
     * @param Router $router
     */
    public function boot(Router $router)
    {
        if ( ! $this->app->routesAreCached()) {
            require __DIR__ . '/Http/routes.php';
        }

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'how-to-videos');

        $this->publishes([
            __DIR__ . '/../config/how-to-videos.php' => config_path('how-to-videos.php'),
        ], 'config');

        $this->publishes([
            __DIR__ . '/../resources' => public_path('vendor/how-to-videos'),
        ], 'public');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/how-to-videos.php', 'how-to-videos'
        );
    }
}
