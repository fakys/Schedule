<?php

namespace App\Models;

use App\Traits\ObjectModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonFormat extends Model
{
    use HasFactory;
    use ObjectModel;

    public static array $technical_fields= [];

    protected $table = 'lesson_formats';
    protected $fillable = ['name', 'description'];

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
    public static function ru_nameTable()
    {
        return 'Формат предметов';
    }
    public static function rules()
    {
        return [
            'name'=>['required', 'string', 'unique:lesson_formats,name', 'between:3,30'],
            'description'=>['string', 'between:3,2000']
        ];
    }
}
