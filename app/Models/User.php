<?php

namespace App\Models;

use App\Traits\ObjectModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    use ObjectModel;

    public $password_confirm;

    public static $connected_models = [
        'user_group'=>UserGroup::class
    ];

    public static array $technical_fields= ['password_confirm'];

    protected static $ru_fields = [
        'login'=>'Логин',
        'name'=>'Имя',
        'surname'=>'Фамилия',
        'patronymic'=>"Отчество",
        'email'=>'Email',
        'user_group_id'=>'Группа пользователей',
        'password'=>'Пароль',
        'password_confirm'=>'Повторите пароль',
        'avatar'=>"Фотография",
        'created_at'=>'Время создания',
        'updated_at'=>'Время обновления'
    ];

    protected $fillable = [
        'login',
        'name',
        'surname',
        'patronymic',
        'email',
        'user_group_id',
        'password',
        'avatar'
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    public static function getMainFields(){
        return [
            'name',
            'email'
        ];
    }

    public static function nameTable(){
        return 'users';
    }
    public static function ru_nameTable(){
        return 'Пользователи';
    }

}
