<?php
namespace App\Models;

use App\Traits\ObjectModel;
use Illuminate\Database\Eloquent\Model;

class TeachersLessons extends Model
{
    use ObjectModel;

    public static array $technical_fields= [];
    protected $table = 'teachers_lessons';
}
