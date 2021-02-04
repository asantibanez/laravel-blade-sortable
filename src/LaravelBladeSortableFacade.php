<?php

namespace Asantibanez\LaravelBladeSortable;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Asantibanez\LaravelBladeSortable\Skeleton\SkeletonClass
 */
class LaravelBladeSortableFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-blade-sortable';
    }
}
