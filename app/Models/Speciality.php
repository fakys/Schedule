<?php

namespace App\Models;

use App\Traits\ObjectModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
    use HasFactory;
    use ObjectModel;

    public static array $technical_fields= [];

    protected $table='specialities';



    public $fillable=[
        'name',
        'number'
    ];
    protected static $ru_fields = [
        'name'=>'Название',
        'number'=>'Номер',
        'created_at'=>'Время создания',
        'updated_at'=>'Время обновления'
    ];

    public static function nameTable(){
        return 'specialities';
    }
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
            'number'=>['required', 'integer', 'unique:specialities,name', 'max:999999999'],
        ];
    }
    public static function get_ru_field($field)
    {
        if(isset(self::$ru_fields[$field])){
            return self::$ru_fields[$field];
        }
        return null;
    }
}
