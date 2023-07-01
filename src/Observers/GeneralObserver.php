<?php

namespace FilamentSound\FilamentSound\Observers;
use File;
use Str;

class GeneralObserver
{
    public function created($model)
    {

        dd(11);
    }

    public function updated($model)
    {
        // Handle the "updated" event
    }

    public function deleted($model)
    {
        // Handle the "deleted" event
    }

    public function restoring($model)
    {
        // Handle the "restoring" event
    }

    public function restored($model)
    {
        // Handle the "restored" event
    }
}
