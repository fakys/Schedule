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

    public $fillable=['name', 'number_breaks', 'time_start', 'time_end'];

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
            'time_start',
            'time_end'
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
