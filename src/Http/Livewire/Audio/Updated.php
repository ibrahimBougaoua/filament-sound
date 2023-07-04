<?php

namespace FilamentSound\FilamentSound\Http\Livewire\Audio;

use Livewire\Component;

class Updated extends Component 
{
    public function render()
    {
        return view('filament-sound::livewire.audio.updated')
                ->layout('filament::components.layouts.base');
    }
}
