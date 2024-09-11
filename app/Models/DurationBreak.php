<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DurationBreak extends Model
{
    use HasFactory;

    public static function nameTable(){
        return 'duration_breaks';
    }
}
