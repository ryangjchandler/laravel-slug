<?php

namespace RyanChandler\LaravelSlug\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \RyanChandler\LaravelSlug\LaravelSlug
 */
class LaravelSlug extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-slug';
    }
}
