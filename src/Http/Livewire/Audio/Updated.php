<?php

namespace FilamentSound\FilamentSound\Http\Livewire\Audio;

use FilamentSound\FilamentSound\Models\SoundSetting;
use Livewire\Component;

class Updated extends Component 
{
    protected $listeners = ['played' => 'resetAudioSettings'];

    public function resetAudioSettings()
    {
        $soundSetting = SoundSetting::first();

        if( $soundSetting )
        {
            $soundSetting->updated = 0;
            $soundSetting->save();
        }
    }
    
    public function render()
    {
        return view('filament-sound::livewire.audio.updated')
                ->layout('filament::components.layouts.base');
    }
}
