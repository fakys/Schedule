<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentGroup extends Model
{
    use HasFactory;

    protected $table='student_groups';

    public static function nameTable(){
        return 'student_groups';
    }

    public function speciality()
    {
        return $this->belongsTo(Speciality::class, 'id');
    }

    public static function getMainFields()
    {
        return [
            'name',
            'full_name'
        ];
    }
}
