<?php

namespace FilamentSound\FilamentSound\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \FilamentSound\FilamentSound\FilamentSound
 */
class FilamentSound extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \FilamentSound\FilamentSound\FilamentSound::class;
    }
}
