<?php

namespace FilamentSound\FilamentSound\Traits;

use FilamentSound\FilamentSound\Models\Sound;

trait InsertModelsNames {

    public static function insertAllModelsNames(array $names = []) : void
    {
        Sound::truncate();

        foreach ($names as $name) {
            Sound::firstOrCreate([
                "name" => $name,
                "model" => "App\\Models\\".$name
            ]);
        }
    }

}
