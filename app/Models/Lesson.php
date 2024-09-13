<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $table = 'lessons';

    public static function nameTable(){
        return 'lessons';
    }

    public static function getMainFields()
    {
        return [
            'name',
            'description'
        ];
    }
}
