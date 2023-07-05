<?php

namespace FilamentSound\FilamentSound\Http\Livewire\Audio;

use FilamentSound\FilamentSound\Models\SoundSetting;
use Livewire\Component;

class Restored extends Component 
{
    protected $listeners = ['played' => 'resetAudioSettings'];

    public function resetAudioSettings()
    {
        $soundSetting = SoundSetting::first();

        if( $soundSetting )
        {
            $soundSetting->restored = 0;
            $soundSetting->save();
        }
    }

    public function render()
    {
        return view('filament-sound::livewire.audio.restored')
                ->layout('filament::components.layouts.base');
    }
}
