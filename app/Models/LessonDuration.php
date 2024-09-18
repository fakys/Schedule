<?php

namespace App\Models;

use App\Traits\HelperModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonDuration extends Model
{
    use HasFactory;
    use HelperModel;

    public static array $technical_fields= [];

    protected $fillable = ['name', 'duration_minutes'];

    private static $ru_fields = [
        'name'=>'Название',
        'duration_minutes'=>'Длительность в минутах',
        'updated_at'=>'Время обновления',
        'created_at'=>'Время создания'
    ];

    protected $table = 'lesson_durations';

    public static function nameTable(){
        return 'lesson_durations';
    }
    public static function ru_nameTable(){
        return 'Длитеотность пар';
    }
    public static function getMainFields()
    {
        return [
            'name',
            'duration_minutes'
        ];
    }
}
