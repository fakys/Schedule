<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $table = 'lessons';

    public $fillable = ['name', 'description', 'teachers'];

    public static $connected_models = [
        'teachers'=>Teacher::class
    ];


    public static function nameTable(){
        return 'lessons';
    }
    public static function ru_nameTable()
    {
        return "Предметы";
    }

    public static function getMainFields()
    {
        return [
            'name',
            'description'
        ];
    }

    public static function rules()
    {
        return [
            'name'=>['required', 'string', 'unique:lessons,name', 'between:3,40'],
            'description'=>['string', 'between:15,1700']
        ];
    }

    private static function add_teacher($model)
    {
        dd($model->teachers);
        foreach ($model->teachers as $val){
            $teachers_lessons = new TeachersLessons();
            $teachers_lessons->teacher_id = $val;
            $teachers_lessons->lesson_id = $model->id;
            $teachers_lessons->save();
        }
    }

    protected static function booted()
    {
        self::creating(function ($model){
            if($model->teachers){
                unset($model->teachers);
            }
        });
        static::created(function ($model) {
            self::add_teacher($model);
        });
    }


}
