<?php

namespace FilamentSound\FilamentSound;

use Filament\Navigation\UserMenuItem;
use Filament\PluginServiceProvider;
use FilamentSound\FilamentSound\Observers\GeneralObserver;
use FilamentSound\FilamentSound\Resources\SoundResource;
use FilamentSound\FilamentSound\Traits\ModelsClassNames;
use FilamentSound\FilamentSound\Traits\InsertModelsNames;
use Spatie\LaravelPackageTools\Package;
use FilamentSound\FilamentSound\Commands\FilamentSoundCommand;

class FilamentSoundServiceProvider extends PluginServiceProvider
{
    protected array $resources = [
        SoundResource::class,
    ];

    protected function getUserMenuItems(): array
    {
        return [
            UserMenuItem::make()
                ->label('Sounds')
                ->url(route('filament.resources.sounds.index'))
                ->icon('heroicon-s-cog'),
        ];
    }

    public function packageBooted(): void
    {
        $classList = ModelsClassNames::getAllModelsClassNames();

        foreach ($classList as $className) {
            $className::observe(GeneralObserver::class);
        }

        InsertModelsNames::insertAllModelsNames(ModelsClassNames::getAllModelsClassNames(false));
    }

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
            ->hasMigration('create_filament_sound_table')
            ->hasCommand(FilamentSoundCommand::class);
    }
}
