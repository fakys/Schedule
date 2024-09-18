<?php
namespace App\Traits;

use App\Models\DurationBreak;
use App\Models\GroupBreak;
use App\Models\Lesson;
use App\Models\LessonDuration;
use App\Models\LessonFormat;
use App\Models\Schedule;
use App\Models\Speciality;
use App\Models\StudentGroup;
use App\Models\Teacher;
use App\Models\User;
use App\Models\UserGroup;
use Illuminate\Database\Eloquent\Model;

trait DataModel
{
    public $data = [
        GroupBreak::class,
        DurationBreak::class,
        Schedule::class,
        Lesson::class,
        LessonDuration::class,
        LessonFormat::class,
        Speciality::class,
        StudentGroup::class,
        Teacher::class,
    ];

    public function getTableByName($name)
    {
        foreach ($this->data as $val){
            if($name == $val::nameTable()) return $val;
        }
        return false;
    }
}
