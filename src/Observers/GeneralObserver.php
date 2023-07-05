<?php

namespace FilamentSound\FilamentSound\Observers;

use FilamentSound\FilamentSound\FilamentSound;
use FilamentSound\FilamentSound\Models\Sound;
use FilamentSound\FilamentSound\Models\SoundSetting;

class GeneralObserver
{
    public $soundSetting;

    public function __construct()
    {
        FilamentSound::resetSettings();
        
        $this->soundSetting = SoundSetting::first();
    }

    public function created($model)
    {
        $sound = Sound::where('model',get_class($model))->first();

        if($sound && $sound->status && $sound->created)
        {
            $this->soundSetting->created = 1;
            $this->soundSetting->save();
        }
    }

    public function updated($model)
    {
        $sound = Sound::where('model',get_class($model))->first();

        if($sound && $sound->status && $sound->updated)
        {
            $this->soundSetting->updated = 1;
            $this->soundSetting->save();
        }
    }

    public function deleted($model)
    {
        $sound = Sound::where('model',get_class($model))->first();

        if($sound && $sound->status && $sound->deleted)
        {
            $this->soundSetting->deleted = 1;
            $this->soundSetting->save();
        }
    }

    public function restored($model)
    {
        $sound = Sound::where('model',get_class($model))->first();

        if($sound && $sound->status && $sound->restored)
        {
            $this->soundSetting->restored = 1;
            $this->soundSetting->save();
        }
    }
}
