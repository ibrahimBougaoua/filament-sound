<?php

namespace FilamentSound\FilamentSound\Resources\SoundResource\Pages;

use Filament\Resources\Pages\ListRecords;
use Filament\Pages\Actions\Action;
use FilamentSound\FilamentSound\Resources\SoundResource;

class ListSounds extends ListRecords
{
    protected static string $resource = SoundResource::class;

    protected function getActions(): array
    {
        return [
            Action::make('restore_settings')
            ->label('Restore Settings')
            ->action(fn () => dd(200))
            ->color('success')
            ->icon('heroicon-s-check')
            ->requiresConfirmation()
            ->modalHeading('Delete posts')
            ->modalSubheading('Are you sure you\'d like to delete these posts? This cannot be undone.')
            ->modalButton('Yes, delete them')
            ->disabled(config('filament-sound.restore_settings'))
        ];
    }
}
