<?php

namespace FilamentSound\FilamentSound\Resources\SoundResource\Pages;

use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use FilamentSound\FilamentSound\Resources\SoundResource;

class EditSound extends EditRecord
{
    protected static string $resource = SoundResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
