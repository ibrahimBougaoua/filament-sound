<?php

namespace FilamentSound\FilamentSound\Http\Livewire\Audio;

use FilamentSound\FilamentSound\FilamentSound;
use Livewire\Component;

class Browse extends Component 
{
    public function render()
    {
        return view('filament-sound::livewire.audio.browse')
                ->layout('filament::components.layouts.base');
    }
}
