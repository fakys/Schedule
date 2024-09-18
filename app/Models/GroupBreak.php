<?php

namespace App\Models;

use App\Interface\ModelInterface;
use App\Traits\HelperModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupBreak extends Model implements ModelInterface
{
    use HasFactory;
    use HelperModel;

    protected $fillable=['name', 'description'];
    public static array $technical_fields = [];

    private static $ru_fields = [
        'name'=>'Название',
        'description'=>'Описание',
        'created_at'=>'Время создания',
        'updated_at'=>'Время обновления'
    ];

    public static function ru_nameTable(): string
    {
        return 'Группы перерывов';
    }
    public static function nameTable(): string
    {
        return 'group_breaks';
    }

    public static function rules(): array
    {
        return [
            'name'=>['required', 'string', 'unique:group_breaks,name', 'between:3,30'],
            'description'=>['string','between:20,1000']
        ];
    }
    public static function getMainFields(): array
    {
        return [
            'name',
            'description'
        ];
    }

}
