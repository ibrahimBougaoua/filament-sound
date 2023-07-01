<?php

namespace FilamentSound\FilamentSound\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoundSetting extends Model
{
    use HasFactory;

    protected $table = 'filament_sound_setting';

    protected $fillable = [
        "created",
        "updated",
        "deleted",
        "restored"
    ];
    
}
