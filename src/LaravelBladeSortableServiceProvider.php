<?php

namespace Asantibanez\LaravelBladeSortable;

use Asantibanez\LaravelBladeSortable\Components\Scripts;
use Asantibanez\LaravelBladeSortable\Components\Sortable;
use Asantibanez\LaravelBladeSortable\Components\SortableItem;
use Blade;
use Illuminate\Support\ServiceProvider;

class LaravelBladeSortableServiceProvider extends ServiceProvider
{
    public function boot()
    {
         $this->loadViewsFrom(__DIR__.'/../resources/views', 'laravel-blade-sortable');

        Blade::component('laravel-blade-sortable::sortable', Sortable::class);
        Blade::component('laravel-blade-sortable::sortable-item', SortableItem::class);
        Blade::component('laravel-blade-sortable::scripts', Scripts::class);
    }

    public function register()
    {
        //
    }
}
