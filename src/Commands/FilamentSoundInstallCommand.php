<?php

namespace FilamentSound\FilamentSound\Commands;

use FilamentSound\FilamentSound\Facades\FilamentSound;
use FilamentSound\FilamentSound\Models\Sound;
use FilamentSound\FilamentSound\Models\SoundSetting;
use Illuminate\Console\Command;

class FilamentSoundInstallCommand extends Command
{
    public $signature = 'filament-sound:install';

    public $description = 'Install filament sound';

    public function handle(): int
    {
        if( FilamentSound::hasMigrated() )
        {
            if( ! SoundSetting::count() )
            SoundSetting::create([
                "created" => 0,
                "updated" => 0,
                "deleted" => 0,
                "restored" => 0
            ]);
            
            if( ! Sound::count() )
                FilamentSound::insertAllModelsSoundSettings();
            
            if( ! SoundSetting::count() || ! Sound::count() )
                $this->comment('Filament sound installed.');
            else
                $this->comment('Filament sound allready installed.');
        } else {
            $this->comment('Filament migration not executed yet !');
            $this->comment('You can publish and run the migrations with :');
            $this->comment('php artisan vendor:publish --tag="filament-sound-migrations"');
            $this->comment('php artisan migrate');
        }
        
        return self::SUCCESS;
    }
}
