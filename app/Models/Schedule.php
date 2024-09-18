<?php
namespace App\Models;

use App\Rules\After;
use App\Traits\ObjectModel;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use ObjectModel;

    public static $technical_fields = [];

    protected $fillable = ['number_pairs', 'date_start', 'day_of_week', 'time_start', 'time_end', 'student_group_id', 'lesson_id', 'teacher_id', 'lesson_duration_id', 'lesson_format_id'];

    public static $connected_models = [
        'group'=>StudentGroup::class,
        'lesson'=>Lesson::class,
        'teacher'=>Teacher::class,
        'lesson_duration'=>LessonDuration::class,
        'lesson_format'=>LessonFormat::class
    ];
    protected static $ru_fields = [
        'number_pairs'=>'Номер пары',
        'date_start'=>'Дата начала',
        'day_of_week'=>"День недели",
        'time_start'=>"Время начала",
        'time_end'=>"Время окончания",
        'student_group_id'=>"Группа студентов",
        'lesson_id'=>"Предметы",
        'teacher_id'=>"Преподователи",
        'lesson_duration_id'=>"Дрительность пары",
        'lesson_format_id'=>'Формат пары',
        'created_at'=>'Время создания',
        'updated_at'=>'Время обновления'
    ];
    public static function nameTable()
    {
        return 'schedules';
    }
    public static function ru_nameTable()
    {
        return 'Расписания';
    }

    public static function getMainFields()
    {
        return ['time_start', 'time_end', 'number_pairs'];
    }

    public static function rules()
    {
        return [
            'number_pairs'=>['required', 'integer', 'max:6'],
            'date_start'=>['required', 'date', 'after_or_equal:today'],
            'day_of_week'=>['required', 'integer', 'max:7'],
            'time_start'=>['required', 'date_format:H:i'],
            'time_end'=>['required', 'date_format:H:i', "after:time_start"],
            'student_group_id'=>['required', 'integer'],
            'lesson_id'=>['required', 'integer'],
            'teacher_id'=>['integer'],
            'lesson_duration_id'=>[ 'integer'],
            'lesson_format_id'=>['integer']
        ];
    }

    public function lesson()
    {
        return $this->hasOne(Lesson::class, 'id', 'lesson_id');
    }
    public function student_group()
    {
        return $this->hasOne(StudentGroup::class, 'id','student_group_id');
    }
}
