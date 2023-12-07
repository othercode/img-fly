<?php

namespace OtherCode\ImgFly;

use Illuminate\Support\ServiceProvider;
use OtherCode\ImgFly\Contracts\ImgFlyContract;

/**
 * Class ImgFlyServiceProvider
 *
 * @author Unay Santisteban <usantisteban@othercode.es>
 * @package OtherCode\ImgFly
 */
class ImgFlyServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/imgfly.php' => config_path('imgfly.php'),
        ], 'config');

        $this->publishes([
            __DIR__.'/assets' => public_path('assets'),
        ], 'public');

        $this->loadRoutesFrom(__DIR__.'/routes/web.php');

        $this->app->bind(ImgFlyContract::class, function () {
            return new ImgFly();
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/config/imgfly.php', 'imgfly');
    }
}
