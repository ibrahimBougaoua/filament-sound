<?php

namespace FilamentSound\FilamentSound\Commands;

use Illuminate\Console\Command;

class FilamentSoundCommand extends Command
{
    public $signature = 'filament-sound';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
