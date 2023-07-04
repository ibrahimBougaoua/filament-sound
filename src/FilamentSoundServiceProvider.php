<?php

namespace FilamentSound\FilamentSound;

use Filament\Facades\Filament;
use Filament\Navigation\UserMenuItem;
use Filament\PluginServiceProvider;
use FilamentSound\FilamentSound\Models\SoundSetting;
use FilamentSound\FilamentSound\Observers\GeneralObserver;
use FilamentSound\FilamentSound\Resources\SoundResource;
use FilamentSound\FilamentSound\Traits\ModelsClassNames;
use Spatie\LaravelPackageTools\Package;
use FilamentSound\FilamentSound\Commands\FilamentSoundCommand;
use FilamentSound\FilamentSound\Observers\SettingObserver;

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
                ->icon('heroicon-s-cog'),
        ];
    }
    
    public function packageBooted(): void
    {
        parent::packageBooted();
        
        //FilamentSound::resetSettings();

        $classList = ModelsClassNames::getAllModelsClassNames();

        //InsertModelsNames::insertAllModelsNames($classList);

        $classList = ModelsClassNames::prepareModelsClassNames($classList);

        foreach ($classList as $className) {
            $className::observe(GeneralObserver::class);
        }
        
        if( FilamentSound::hasObserved() )
            Filament::serving(fn () => \FilamentSound\FilamentSound\FilamentSound::initComponent());

        //SoundSetting::observe(SettingObserver::class);
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
