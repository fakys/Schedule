<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\DurationBreak;
use App\Models\Lesson;
use App\Models\LessonFormat;
use App\Models\Speciality;
use App\Models\StudentGroup;
use App\Models\Teacher;
use App\Traits\AdminHelper;
use App\Traits\DataModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use PHPUnit\Event\Telemetry\Duration;

class AdminController extends Controller
{
    use DataModel;
    use AdminHelper;
    public function index()
    {
        $teachers = Teacher::class;
        $student_groups = StudentGroup::class;
        $specialities = Speciality::class;
        $lessons = Lesson::class;
        $lesson_formats= LessonFormat::class;
        $duration_breaks = DurationBreak::class;
        return view('admin.index', compact('teachers', 'student_groups', 'specialities', 'lessons', 'lesson_formats', 'duration_breaks'));
    }
    public function show_model($table, Request $request)
    {

        if($request->input('search')){
            $model = $this->SearchInModel($this->getTableByName($table), $request->input('search'));
        }else{
            $model = $this->getTableByName($table)::all();
        }
        if(!$model){
            abort(404);
        }else{
            $columns = Schema::getColumnListing($table);
        }
        return view('admin.show_model', compact('model', 'columns', 'table'));
    }
}
