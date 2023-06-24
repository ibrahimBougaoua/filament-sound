<?php

namespace FilamentSound\FilamentSound;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use FilamentSound\FilamentSound\Commands\FilamentSoundCommand;

class FilamentSoundServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('filament-sound')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_filament-sound_table')
            ->hasCommand(FilamentSoundCommand::class);
    }
}
