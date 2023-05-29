<?php

namespace FlixtechsLabs\Bytepoint;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use FlixtechsLabs\Bytepoint\Commands\BytepointCommand;

class BytepointServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-bytepoint')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-bytepoint_table')
            ->hasCommand(BytepointCommand::class);
    }
}
