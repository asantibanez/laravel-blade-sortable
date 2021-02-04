<?php

namespace Asantibanez\LaravelBladeSortable;

use Asantibanez\LaravelBladeSortable\Components\Scripts;
use Asantibanez\LaravelBladeSortable\Components\Sortable;
use Asantibanez\LaravelBladeSortable\Components\SortableItem;
use Blade;
use Illuminate\Support\ServiceProvider;

class LaravelBladeSortableServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'laravel-blade-sortable');
         $this->loadViewsFrom(__DIR__.'/../resources/views', 'laravel-blade-sortable');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('laravel-blade-sortable.php'),
            ], 'config');

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/laravel-blade-sortable'),
            ], 'views');*/

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/laravel-blade-sortable'),
            ], 'assets');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/laravel-blade-sortable'),
            ], 'lang');*/

            // Registering package commands.
            // $this->commands([]);
        }

        Blade::component('laravel-blade-sortable::sortable', Sortable::class);
        Blade::component('laravel-blade-sortable::sortable-item', SortableItem::class);
        Blade::component('laravel-blade-sortable::scripts', Scripts::class);
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        //
    }
}
