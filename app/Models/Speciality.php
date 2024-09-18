<?php

namespace App\Models;

use App\Interface\ModelInterface;
use App\Traits\HelperModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Speciality extends Model implements ModelInterface
{
    use HasFactory;
    use HelperModel;

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

    public static function nameTable(): string
    {
        return 'specialities';
    }
    public static function getMainFields(): array
    {
        return [
            'name',
            'number'
        ];
    }
    public static function ru_nameTable(): string
    {
        return 'Специальности';
    }
    public static function rules(): array
    {
        return [
            'name'=>['required', 'string', 'unique:specialities,name'],
            'number'=>['required', 'integer', 'unique:specialities,name', 'max:999999999'],
        ];
    }
}
