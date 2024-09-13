<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonDuration extends Model
{
    use HasFactory;

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
