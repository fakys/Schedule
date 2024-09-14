<?php

namespace App\Models;

use App\View\Components\CreateTeacherComponent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $table= 'teachers';

    public static function nameTable(){
        return 'teachers';
    }
    public static function ru_nameTable()
    {
        return 'Преподователи';
    }

    public static function getMainFields()
    {
        return [
            'name',
            'surname',
            'patronymic',
            'email',
            'avatar'
        ];
    }

    public $fillable = [
        'name',
        'surname',
        'patronymic',
        'email',
        'avatar',
        'date_birth',
        'number',

    ];

    public static function rules(): array
    {
        return [
            'name'=>['required', 'string'],
            'surname'=>['required', 'string'],
            'patronymic'=>['string'],
            'email'=>['required', 'email'],
            'avatar'=>['image','mimes:jpeg,png', 'max:1024'],
            'date_birth'=>['date', 'before:today'],
            'number'=>['integer'],
        ];
    }
}
