<?php

namespace FilamentSound\FilamentSound\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sound extends Model
{
    use HasFactory;

    protected $table = 'filament_sound';

    protected $fillable = [
        "model",
        "created",
        "updated",
        "deleted",
        "restored",
        "status"
    ];

    protected $attributes = [
        "created" => true,
        "updated" => true,
        "deleted" => true,
        "restored" => true,
        "status" => true
    ];
}
