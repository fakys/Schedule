<?php
namespace App\Models;

use App\Interface\ModelInterface;
use App\Traits\HelperModel;
use Illuminate\Database\Eloquent\Model;

class TeachersLessons extends Model implements ModelInterface
{
    use HelperModel;

    public static array $technical_fields= [];
    protected $fillable = ['teacher_id', 'lesson_id'];
    protected $table = 'teachers_lessons';

    public static function getMainFields(): array
    {
        return [];
    }

    public static function nameTable(): string
    {
        return 'teachers_lessons';
    }

    public static function ru_nameTable(): string
    {
        return '';
    }

    public static function rules(): array
    {
        return [];
    }
}
