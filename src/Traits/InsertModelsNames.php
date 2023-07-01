<?php

namespace FilamentSound\FilamentSound\Traits;

use FilamentSound\FilamentSound\Models\Sound;

trait InsertModelsNames {

    public static function insertAllModelsNames(array $models = []) : void
    {
        foreach ($models as $model) {
            Sound::firstOrCreate([
                "model" => $model
            ]);
        }
    }

}
