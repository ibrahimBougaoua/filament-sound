<?php

namespace FilamentSound\FilamentSound\Http\Livewire\Audio;

use FilamentSound\FilamentSound\Models\SoundSetting;
use Livewire\Component;

class Deleted extends Component 
{
    protected $listeners = ['played' => 'resetAudioSettings'];

    public function resetAudioSettings()
    {
        $soundSetting = SoundSetting::first();

        if( $soundSetting )
        {
            $soundSetting->deleted = 0;
            $soundSetting->save();
        }
    }
    
    
    public function render()
    {
        return view('filament-sound::livewire.audio.deleted')
                ->layout('filament::components.layouts.base');
    }
}
