<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $table= 'teachers';

    public static function nameTable(){
        return 'teachers';
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
}
