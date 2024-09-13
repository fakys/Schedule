<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonFormat extends Model
{
    use HasFactory;

    protected $table = 'lesson_formats';

    public static function nameTable(){
        return 'lesson_formats';
    }
    public static function getMainFields()
    {
        return [
            'name',
            'description'
        ];
    }
}
