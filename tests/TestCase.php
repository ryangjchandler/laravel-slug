<?php

namespace RyanChandler\Slug\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use RyanChandler\Slug\LaravelSlugServiceProvider;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [
            LaravelSlugServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');
    }
}
