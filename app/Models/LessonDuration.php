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

    protected $fillable = ['name', 'duration_minutes'];

    private static $ru_fields = [
        'name'=>'Название',
        'duration_minutes'=>'Длительность в минутах',
        'updated_at'=>'Время обновления'
    ];

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
