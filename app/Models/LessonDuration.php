<?php

namespace App\Models;

use App\Traits\ObjectModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonDuration extends Model
{
    use HasFactory;
    use ObjectModel;

    public static array $technical_fields= [];

    protected $table = 'duration_lessons';

    public static function nameTable(){
        return 'duration_lessons';
    }

    public static function getMainFields()
    {
        return [
            'name',
            'duration_minutes'
        ];
    }
}
