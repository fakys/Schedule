<?php

namespace App\Models;

use App\Traits\ObjectModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    use ObjectModel;

    public static array $technical_fields= [];
    protected static $ru_fields = [
        'name'=>'Имя',
        'surname'=>'Фамилия',
        'patronymic'=>"Отчество",
        'email'=>'Email',
        'avatar'=>'Фотография',
        'date_birth'=>'Дата рождения',
        'number'=>"Номер телефона",
        'created_at'=>'Время создания',
        'updated_at'=>'Время обновления'
    ];
    public $table= 'teachers';

    public static function nameTable(){
        return 'teachers';
    }
    public static function ru_nameTable()
    {
        return 'Преподователи';
    }

    public static function getMainFields()
    {
        return [
            'name',
            'surname',
            'patronymic',
            'email',
        ];
    }

    public $fillable = [
        'name',
        'surname',
        'patronymic',
        'email',
        'avatar',
        'date_birth',
        'number',
    ];

    public $image_fields = [
        'avatar'
    ];

    public static function rules(): array
    {
        return [
            'name'=>['required', 'string', 'between:3,40'],
            'surname'=>['required', 'string', 'between:3,40'],
            'patronymic'=>['string', 'between:3,40'],
            'email'=>['required', 'email', 'unique:teachers,email'],
            'avatar'=>['image','mimes:jpeg', 'max:1024'],
            'date_birth'=>['date', 'before:today'],
            'number'=>['string', 'between:11, 11'],
        ];
    }

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model){
            self::save_avatar($model);
        });
    }

    public function loadFiles($files)
    {
        foreach ($files as $key=>$val){
            $this->$key = $val;
        }
    }
    private static function save_avatar($model)
    {
        if($model->avatar){
            $file = $model->avatar;
            $model->avatar = "storage/{$file->store('image/teacher_ava', 'public')}";
        }else{
            $model->avatar = "assets/img/user/start_user_ava.jpg";
        }

    }
    public static function get_ru_field($field)
    {
        if(isset(self::$ru_fields[$field])){
            return self::$ru_fields[$field];
        }
        return null;
    }
}
