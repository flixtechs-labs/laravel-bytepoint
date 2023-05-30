<?php

namespace FlixtechsLabs\Bytepoint;

use FlixtechsLabs\Bytepoint\Commands\BytepointCommand;
use Illuminate\Http\UploadedFile;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

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

   public function boot(): void
   {
       parent::boot();

       UploadedFile::macro('bytepoint', function (array $options = []) {
           app(Bytepoint::class)->optimizeUploadedFile($this, $options);

           return new UploadedFile(
               $this->getRealPath(),
               $this->getClientOriginalName(),
               $this->getMimeType(),
               null,
               true
           );
       });
   }
}
