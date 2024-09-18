<?php

namespace App\Models;

use App\Traits\ObjectModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

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

    public $image_fields = ['avatar'];

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

    private static function save_user_ava($model)
    {
        if($model->avatar){
            $file = $model->avatar;
            $model->avatar = "storage/{$file->store('image/users_ava', 'public')}";
        }else{
            $model->avatar = "assets/img/user/start_user_ava.jpg";
        }
    }
    private static function delete_ava($model)
    {
        if($model->avatar){
            $file_push = str_replace('storage/','', $model->avatar);
            if(Storage::disk('public')->exists($file_push)){
                return Storage::disk('public')->delete($file_push);
            }
        }
    }

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model){
            self::save_user_ava($model);
        });
        self::deleting(function ($model){
            self::delete_ava($model);
        });
    }

    public static function rules()
    {
        return [
            'login'=>['required', 'string', 'between:3,40', 'unique:users,login'],
            'name'=>['required', 'string', 'between:3,40'],
            'surname'=>['required', 'string', 'between:3,40'],
            'patronymic'=>['string', 'between:3,40'],
            'email'=>['required', 'email', 'unique:users,email'],
            'avatar'=>['image','mimes:jpeg', 'max:1024'],
            'password'=>['required', 'string', 'required_with:password_confirm', 'same:password_confirm'],
            'password_confirm'=>['required', 'string']
        ];
    }

    public static function nameTable(){
        return 'users';
    }
    public static function ru_nameTable(){
        return 'Пользователи';
    }

}
