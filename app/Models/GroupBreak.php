<?php

namespace App\Models;

use App\Traits\ObjectModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupBreak extends Model
{
    use HasFactory;
    use ObjectModel;

    protected $fillable=['name', 'description'];
    public static array $technical_fields = [];

    private static $ru_fields = [
        'name'=>'Название',
        'description'=>'Описание',
        'created_at'=>'Время создания',
        'updated_at'=>'Время обновления'
    ];

    public static function ru_nameTable()
    {
        return 'Группы перерывов';
    }
    public static function nameTable()
    {
        return 'group_breaks';
    }

    public static function rules()
    {
        return [
            'name'=>['required', 'string', 'unique:group_breaks,name', 'between:3,30'],
            'description'=>['string','between:20,1000']
        ];
    }
    public static function getMainFields(){
        return [
            'id',
            'name',
            'description'
        ];
    }

}
