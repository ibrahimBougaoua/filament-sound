<?php

namespace FilamentSound\FilamentSound\Traits;
use File;
use Str;

trait ModelsClassNames {

    public static function getAllModelsClassNames(bool $full = true) : array
    {
        $modelsPath = app_path('Models');

        $modelFiles = File::files($modelsPath);
        
        $classList = [];

        foreach ($modelFiles as $file) {
            $fileName = pathinfo($file, PATHINFO_FILENAME);

            $className = Str::studly($fileName);
            
            if (class_exists("App\\Models\\{$className}") && is_subclass_of("App\\Models\\{$className}", 'Illuminate\Database\Eloquent\Model')) {
                $classList[] = $full ? "App\\Models\\".$className : $className;
            }
        }

        return $classList;
    }

}
