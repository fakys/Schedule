<?php

namespace App\Models;

use App\Interface\ModelInterface;
use App\Traits\HelperModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model implements ModelInterface
{
    use HasFactory;
    use HelperModel;

    public static array $technical_fields= [];
    public $fillable = ['name'];

    protected $table= 'user_groups';

    public static function nameTable(): string
    {
        return 'user_groups';
    }

    protected static $ru_fields = [
        'name'=>'Название',
        'created_at'=>'Время создания',
        'updated_at'=>'Время обновления'
    ];
    public static function getMainFields(): array
    {
        return [
            'name',
            'created_at',
            'updated_at'
        ];
    }
    public static function ru_nameTable(): string
    {
        return 'Группы пользователей';
    }

    public static function rules(): array
    {
        return [
            'name'=>['required', 'string', 'unique:user_groups,name']
        ];
    }
}
