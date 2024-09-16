<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupBreak extends Model
{
    use HasFactory;

    public static function ru_nameTable()
    {
        return 'Группы перерывов';
    }
    public static function nameTable()
    {
        return 'group_breaks';
    }
}
