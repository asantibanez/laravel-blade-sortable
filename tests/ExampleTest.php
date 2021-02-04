<?php

namespace Asantibanez\LaravelBladeSortable\Tests;

use Orchestra\Testbench\TestCase;
use Asantibanez\LaravelBladeSortable\LaravelBladeSortableServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [LaravelBladeSortableServiceProvider::class];
    }
    
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
