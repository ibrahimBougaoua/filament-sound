<?php

namespace FilamentSound\FilamentSound\Http\Livewire\Audio;

use FilamentSound\FilamentSound\Models\SoundSetting;
use Livewire\Component;

class Created extends Component 
{
    protected $listeners = ['played' => 'resetAudioSettings'];

    public function resetAudioSettings()
    {
        $soundSetting = SoundSetting::first();

        if( $soundSetting )
        {
            $soundSetting->created = 0;
            $soundSetting->save();
        }
    }

    public function render()
    {
        return view('filament-sound::livewire.audio.created')
                ->layout('filament::components.layouts.base');
    }
}
