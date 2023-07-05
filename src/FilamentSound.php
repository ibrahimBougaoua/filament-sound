<?php

namespace FilamentSound\FilamentSound;

use Blade;
use Filament\Facades\Filament;
use FilamentSound\FilamentSound\Http\Livewire\Audio\Browse;
use FilamentSound\FilamentSound\Http\Livewire\Audio\Created;
use FilamentSound\FilamentSound\Http\Livewire\Audio\Updated;
use FilamentSound\FilamentSound\Http\Livewire\Audio\Deleted;
use FilamentSound\FilamentSound\Http\Livewire\Audio\Restored;
use FilamentSound\FilamentSound\Models\SoundSetting;
use FilamentSound\FilamentSound\Observers\GeneralObserver;
use FilamentSound\FilamentSound\Traits\ModelsClassNames;
use Illuminate\Support\Facades\Schema;
use Livewire\Livewire;

class FilamentSound
{
    public static $operationClass = [
        'browse' => Browse::class,
        'data.created' => Created::class,
        'data.updated' => Updated::class,
        'data.deleted' => Deleted::class,
        'data.restored' => Restored::class,
    ];

    public static function callComponent($name = "browse", $key = "browse") : void
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

    public static function prepareModelsClassNames()
    {
        $classList = ModelsClassNames::prepareModelsClassNames(
            ModelsClassNames::getAllModelsClassNames()
        );

        foreach ($classList as $className)
            $className::observe(GeneralObserver::class);
    }

    public static function hasMigrated()
    {
        if( Schema::hasTable('filament_sound_setting') && Schema::hasTable('filament_sound_setting') ) 
            return true;
        return false;
    }
}
