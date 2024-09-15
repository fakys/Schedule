<?php

namespace App\Models;

use App\Traits\ObjectModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentGroup extends Model
{
    use HasFactory;
    use ObjectModel;

    public static array $technical_fields= [];

    protected $table='student_groups';

    protected $fillable = ['name', 'full_name', 'speciality_id'];

    public static $connected_models = [
        'specialities'=>Speciality::class
    ];

    public static function nameTable(){
        return 'student_groups';
    }
    public static function ru_nameTable()
    {
        return 'Группы';
    }

    public function speciality()
    {
        return $this->belongsTo(Speciality::class, 'id');
    }

    public static function getMainFields()
    {
        return [
            'name',
            'full_name'
        ];
    }
    public static function rules()
    {
        return [
            'name'=>['required', 'string', 'between:2,10', 'unique:student_groups,name'],
            'full_name'=>['required', 'string', 'between:5,50', 'unique:student_groups,full_name'],
            'speciality_id'=>['required', 'integer']
        ];
    }
}
