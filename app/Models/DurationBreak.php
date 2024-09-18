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

    public $fillable=['name', 'number_breaks', 'time_start', 'time_end', 'group_break_id', 'duration_minutes'];

    private static $ru_fields = [
        'name'=>'Название',
        'number_breaks'=>'Номер перерыва',
        'time_start'=>'Время начала',
        'time_end'=>'Время окончания',
        'group_break_id'=>'Гуппа перерывов',
        'duration_minutes'=>'Длительность в минутах',
        'created_at'=>'Время создания',
        'updated_at'=>'Время обновления'
    ];

    public static $connected_models = [
        'group_breaks'=>GroupBreak::class
    ];

    public static function nameTable(){
        return 'duration_breaks';
    }
    public static function ru_nameTable()
    {
        return 'Перерывы';
    }

    public static function getMainFields()
    {
        return [
            'name',
            'number_breaks',
        ];
    }
    public static function rules()
    {
        return  [
            'name'=>['string', 'unique:duration_breaks,name', 'between:3,40'],
            'number_breaks'=>['required','integer', 'between:1,6'],
            'time_start'=>['required','date_format:H:i'],
            'time_end'=>['required','date_format:H:i']
        ];
    }
}
