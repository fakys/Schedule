<?php
namespace App\Models;

use App\Traits\ObjectModel;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use ObjectModel;

    protected $fillable = ['number_pairs', 'date_start', 'day_of_week', 'time_start', 'time_end', 'student_group_id', 'lesson_id', 'teacher_id', 'lesson_duration_id', 'lesson_format_id'];
    protected static $ru_fields = [
        'number_pairs'=>'Номер пары',
        'date_start'=>'Дата начала',
        'day_of_week'=>"День недели",
        'time_start'=>"Время начала",
        'time_end'=>"Время окончания",
        'student_group_id'=>"Группа студентов",
        'lesson_id'=>"Прудметы",
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

    public function lesson()
    {
        $this->hasOne(Lesson::class, 'lesson_id');
    }
    public function student_group()
    {
        $this->hasOne(StudentGroup::class, 'student_group_id');
    }
}
