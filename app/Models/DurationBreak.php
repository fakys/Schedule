<?php

namespace App\Models;

use App\Traits\ObjectModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DurationBreak extends Model
{
    use HasFactory;
    use ObjectModel;

    public static array $technical_fields= [];

    public static function nameTable(){
        return 'duration_breaks';
    }

    public static function getMainFields()
    {
        return [
            'name',
            'number_breaks',
            'time_start',
            'time_end'
        ];
    }
}
