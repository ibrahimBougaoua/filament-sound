<?php

namespace FilamentSound\FilamentSound\Resources\SoundResource\Pages;

use Filament\Resources\Pages\ListRecords;
use Filament\Pages\Actions\Action;
use FilamentSound\FilamentSound\FilamentSound;
use FilamentSound\FilamentSound\Resources\SoundResource;

class ListSounds extends ListRecords
{
    protected static string $resource = SoundResource::class;

    protected function getActions(): array
    {
        return [
            Action::make('restore_settings')
            ->label('Restore Settings')
            ->action(fn () => FilamentSound::restoreSettings())
            ->color('success')
            ->icon('heroicon-s-check')
            ->requiresConfirmation()
            ->modalHeading('Restore Settings')
            ->modalSubheading('Are you sure you\'d like to restore settings ?.')
            ->modalButton('Yes, Restore them')
            ->disabled(config('filament-sound.restore_settings'))
        ];
    }
}
