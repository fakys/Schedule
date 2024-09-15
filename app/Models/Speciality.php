<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
    use HasFactory;
    protected $table='specialities';

    public static function nameTable(){
        return 'specialities';
    }

    public $fillable=[
        'name',
        'number'
    ];


    public static function getMainFields()
    {
        return [
            'name'
        ];
    }
    public static function ru_nameTable()
    {
        return 'Специальности';
    }
    public static function rules()
    {
        return [
            'name'=>['required', 'string', 'unique:specialities,name'],
            'number'=>['required', 'integer', 'unique:specialities,name', 'max:9'],
        ];
    }
}
