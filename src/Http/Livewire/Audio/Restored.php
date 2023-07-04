<?php

namespace FilamentSound\FilamentSound\Http\Livewire\Audio;

use Livewire\Component;

class Restored extends Component 
{
    public function render()
    {
        return view('filament-sound::livewire.audio.restored')
                ->layout('filament::components.layouts.base');
    }
}
