<?php

namespace FilamentSound\FilamentSound;

use Blade;
use Filament\Facades\Filament;
use FilamentSound\FilamentSound\Http\Livewire\Audio\Created;
use FilamentSound\FilamentSound\Http\Livewire\Audio\Updated;
use FilamentSound\FilamentSound\Http\Livewire\Audio\Deleted;
use FilamentSound\FilamentSound\Http\Livewire\Audio\Restored;
use FilamentSound\FilamentSound\Models\SoundSetting;
use Livewire\Livewire;

class FilamentSound
{
    public static $operationClass = [
        'data.created' => Created::class,
        'data.updated' => Updated::class,
        'data.deleted' => Deleted::class,
        'data.restored' => Restored::class,
    ];

    public static function callComponent($name , $key) : void
    {
        Livewire::component($name, FilamentSound::$operationClass[$key]);
        Filament::registerRenderHook(
            'body.end',
            fn (): string => Blade::render("@livewire('".$name."')")
        );
    }

    public static function initComponent()
    {
        $soundSetting = SoundSetting::first();

        if($soundSetting)
        {
            if($soundSetting->created)
                FilamentSound::callComponent("created","data.created");

            if($soundSetting->updated)
                FilamentSound::callComponent("updated","data.updated");

            if($soundSetting->deleted)
                FilamentSound::callComponent("deleted","data.deleted");

            if($soundSetting->restored)
                FilamentSound::callComponent("restored","data.restored");
        }
    }

    public static function resetSettings()
    {
        $soundSetting = SoundSetting::first();

        if( $soundSetting )
        {
            $soundSetting->created = 0;
            $soundSetting->updated = 0;
            $soundSetting->deleted = 0;
            $soundSetting->restored = 0;
            $soundSetting->save();
        }
    }

    public static function hasObserved()
    {
        $soundSetting = SoundSetting::first();

        if( $soundSetting &&
            (
                $soundSetting->created ||
                $soundSetting->updated ||
                $soundSetting->deleted ||
                $soundSetting->restored 
            )
        )
            return true;

        return false;
    }
}
