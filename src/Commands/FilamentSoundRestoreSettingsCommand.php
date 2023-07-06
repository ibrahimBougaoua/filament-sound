<?php

namespace FilamentSound\FilamentSound\Commands;

use FilamentSound\FilamentSound\Facades\FilamentSound;
use Illuminate\Console\Command;

class FilamentSoundRestoreSettingsCommand extends Command
{
    public $signature = 'filament-sound:restore-settings';

    public $description = 'Filament Sound Restore Settings';

    public function handle(): int
    {
        if( FilamentSound::hasMigrated() )
            FilamentSound::restoreSettings();
        
        $this->comment('Filament Sound Settings has been Restored.');

        return self::SUCCESS;
    }
}
