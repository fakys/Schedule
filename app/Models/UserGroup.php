<?php

namespace App\Models;

use App\Traits\ObjectModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model
{
    use HasFactory;
    use ObjectModel;

    public static array $technical_fields= [];
    public $fillable = ['name'];

    protected $table= 'user_groups';

    public static function nameTable(){
        return 'user_groups';
    }

    protected static $ru_fields = [
        'name'=>'Название',
        'created_at'=>'Время создания',
        'updated_at'=>'Время обновления'
    ];
    public static function getMainFields(){
        return [
            'name',
            'created_at',
            'updated_at'
        ];
    }
    public static function ru_nameTable()
    {
        return 'Группы пользователей';
    }

    public static function rules()
    {
        return [
            'name'=>['required', 'string', 'unique:user_groups,name']
        ];
    }
}
