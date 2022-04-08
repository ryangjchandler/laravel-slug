<?php

namespace RyanChandler\Slug;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use RyanChandler\Slug\Commands\LaravelSlugCommand;

class LaravelSlugServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-slug')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-slug_table')
            ->hasCommand(LaravelSlugCommand::class);
    }
}
