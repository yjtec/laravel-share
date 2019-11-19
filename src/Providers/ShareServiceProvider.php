<?php
namespace Yjtec\LaravelShare\Providers;

use Illuminate\Support\ServiceProvider;
use Yjtec\LaravelShare\Share;
class ShareServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
         $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('share', function ($app) {
            return new Share(config('share'));
        });
    }
}
//ShareServiceProvider.php