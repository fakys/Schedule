<?php

namespace App\Models;

use App\Interface\ModelInterface;
use App\Traits\HelperModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentGroup extends Model implements ModelInterface
{
    use HasFactory;
    use HelperModel;

    public static array $technical_fields= [];

    protected $table='student_groups';

    protected $fillable = ['name', 'full_name', 'speciality_id', 'year'];
    protected static $ru_fields = [
        'name'=>'Название',
        'year'=>'Курс',
        'full_name'=>'Полное название',
        'speciality_id'=>'Специальность',
        'created_at'=>'Время создания',
        'updated_at'=>'Время обновления'
    ];

    public static $connected_models = [
        'specialities'=>Speciality::class
    ];

    public static function nameTable(): string
    {
        return 'student_groups';
    }
    public static function ru_nameTable(): string
    {
        return 'Группы';
    }

    public function speciality()
    {
        return $this->belongsTo(Speciality::class, 'speciality_id', 'id');
    }

    public static function getMainFields(): array
    {
        return [
            'name',
            'year',
            'full_name'
        ];
    }
    public static function rules(): array
    {
        return [
            'name'=>['required', 'string', 'between:2,10', 'unique:student_groups,name'],
            'year'=>['required', 'integer', 'between:0,5'],
            'full_name'=>['required', 'string', 'between:5,50'],
            'speciality_id'=>['required', 'integer']
        ];
    }
}
