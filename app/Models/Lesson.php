<?php

namespace App\Models;

use App\Interface\ModelInterface;
use App\Traits\HelperModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model implements ModelInterface
{
    use HasFactory;
    use HelperModel;

    public static array $technical_fields= ['teachers'];

    public $fillable = ['name', 'description', 'teachers'];

    private static $ru_fields = [
        'name'=>'Название',
        'description'=>'Описание',
        'teachers'=>'Преподователи',
        'created_at'=>'Время создания',
        'updated_at'=>'Время обновления'
    ];

    protected $table = 'lessons';

    public static $connected_models = [
        'teachers'=>Teacher::class
    ];


    public static function nameTable(): string
    {
        return 'lessons';
    }
    public static function ru_nameTable(): string
    {
        return "Предметы";
    }

    public static function getMainFields(): array
    {
        return [
            'name',
            'description'
        ];
    }

    public static function rules(): array
    {
        return [
            'name'=>['required', 'string', 'unique:lessons,name', 'between:3,40'],
            'description'=>['string', 'between:15,1700']
        ];
    }

    private static function add_teacher($model)
    {
        foreach ($model->get_technical_fields('teachers') as $val){
            $teachers_lessons = new TeachersLessons();
            $teachers_lessons->teacher_id = $val;
            $teachers_lessons->lesson_id = $model->id;
            $teachers_lessons->save();
        }
    }

    protected static function booted()
    {
        self::creating(function ($model){

        });
        static::created(function ($model) {
            self::add_teacher($model);
        });
    }
}
