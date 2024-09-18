<?php

namespace App\Models;

use App\Interface\ModelInterface;
use App\Traits\HelperModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonFormat extends Model implements ModelInterface
{
    use HasFactory;
    use HelperModel;

    public static array $technical_fields= [];

    protected $table = 'lesson_formats';
    protected $fillable = ['name', 'description'];

    private static $ru_fields = [
        'name'=>'Название',
        'description'=>'Описание',
        'created_at'=>'Время создания',
        'updated_at'=>'Время обновления'
    ];

    public static function nameTable(): string
    {
        return 'lesson_formats';
    }
    public static function getMainFields(): array
    {
        return [
            'name',
            'description'
        ];
    }
    public static function ru_nameTable(): string
    {
        return 'Формат предметов';
    }
    public static function rules(): array
    {
        return [
            'name'=>['required', 'string', 'unique:lesson_formats,name', 'between:3,30'],
            'description'=>['string', 'between:3,2000']
        ];
    }
}
