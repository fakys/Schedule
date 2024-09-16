<?php
namespace App\Models;

use App\Traits\ObjectModel;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use ObjectModel;

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
