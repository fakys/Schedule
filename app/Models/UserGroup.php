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

    protected $table= 'users_groups';

    public static function nameTable(){
        return 'users_groups';
    }
}
