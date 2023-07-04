<?php

namespace FilamentSound\FilamentSound\Traits;

use FilamentSound\FilamentSound\Models\Sound;

trait InsertModelsNames {

    public static function insertAllModelsNames(array $names = []) : void
    {
        foreach ($names as $name) {
            Sound::firstOrCreate([
                "name" => $name,
                "model" => "App\\Models\\".$name
            ]);
        }
    }

}
