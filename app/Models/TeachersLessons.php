<?php
namespace App\Models;

use App\Traits\HelperModel;
use Illuminate\Database\Eloquent\Model;

class TeachersLessons extends Model
{
    use HelperModel;

    public static array $technical_fields= [];
    protected $fillable = ['teacher_id', 'lesson_id'];
    protected $table = 'teachers_lessons';
}
