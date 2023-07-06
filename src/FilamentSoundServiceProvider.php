<?php

namespace FilamentSound\FilamentSound;

use FilamentSound\FilamentSound\Commands\FilamentSoundInstallCommand;
use FilamentSound\FilamentSound\Commands\FilamentSoundRestoreSettingsCommand;
use Filament\Facades\Filament;
use Filament\Navigation\UserMenuItem;
use Filament\PluginServiceProvider;
use FilamentSound\FilamentSound\Resources\SoundResource;
use Spatie\LaravelPackageTools\Package;
use FilamentSound\FilamentSound\FilamentSound;
use FilamentSound\FilamentSound\Models\SoundSetting;

class FilamentSoundServiceProvider extends PluginServiceProvider
{
    protected array $scripts = [
        'filament-sound-js' => __DIR__ . '/../dist/script.js',
    ];

    protected array $resources = [
        SoundResource::class,
    ];

    protected function getUserMenuItems(): array
    {
        return [
            UserMenuItem::make()
                ->label('Sounds')
                ->url(route('filament.resources.sounds.index'))
                ->icon('heroicon-s-play'),
        ];
    }
    
    public function packageBooted(): void
    {
        if( FilamentSound::hasMigrated() && config('filament-sound.audio') && SoundSetting::count() > 0 )
        {
            FilamentSound::prepareModelsClassNames();

            if( FilamentSound::hasObserved() )
                Filament::serving(fn () => FilamentSound::initComponent());
            else if( config('filament-sound.browse_audio') )
                Filament::serving(fn () => FilamentSound::callComponent());
        }
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
            ->hasCommands([
                FilamentSoundInstallCommand::class,
                FilamentSoundRestoreSettingsCommand::class,
            ]);
    }
}
