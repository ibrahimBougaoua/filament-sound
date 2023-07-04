<?php

namespace FilamentSound\FilamentSound\Observers;

use FilamentSound\FilamentSound\FilamentSound;
use FilamentSound\FilamentSound\Models\SoundSetting;

class SettingObserver
{
    public function updated(SoundSetting $soundSetting)
    {
        FilamentSound::resetSettings();
    }
}
