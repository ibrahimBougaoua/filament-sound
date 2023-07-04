<?php

namespace FilamentSound\FilamentSound\Http\Livewire\Audio;

use Livewire\Component;

class Deleted extends Component 
{
    public function render()
    {
        return view('filament-sound::livewire.audio.deleted')
                ->layout('filament::components.layouts.base');
    }
}
