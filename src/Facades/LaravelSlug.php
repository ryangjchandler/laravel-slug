<?php

namespace RyanChandler\Slug\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \RyanChandler\Slug\LaravelSlug
 */
class LaravelSlug extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-slug';
    }
}
