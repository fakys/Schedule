<?php
namespace App\Traits;

use App\Models\DurationBreak;
use App\Models\Lesson;
use App\Models\LessonDuration;
use App\Models\LessonFormat;
use App\Models\Speciality;
use App\Models\StudentGroup;
use App\Models\Teacher;
use App\Models\User;
use App\Models\UserGroup;
use Illuminate\Database\Eloquent\Model;

trait DataModel
{
    public $data = [
        DurationBreak::class,
        Lesson::class,
        LessonDuration::class,
        LessonFormat::class,
        Speciality::class,
        StudentGroup::class,
        Teacher::class,
        User::class,
        UserGroup::class
    ];

    public function getTableByName($name)
    {
        foreach ($this->data as $val){
            if($name == $val::nameTable()) return $val;
        }
        return false;
    }
}
