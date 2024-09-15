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
use Illuminate\Validation\ValidationException;
use PHPUnit\Event\Telemetry\Duration;
use function Termwind\render;

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

    public function create_model($table)
    {
        $table = $this->getTableByName($table);
        if($table){
            return view('admin.create', ['model'=>$table]);
        }else{
            abort(404);
        }
    }


    public function store_model($table, Request $request)
    {
        $table = $this->getTableByName($table);
        if($table && $request->post()){
            $data = array_merge($request->post(), $request->file());
            if(validate($data, $table::rules())){

                $new_model = new $table($request->post());
                if($request->file()){
                    $new_model->loadFiles($request->file());
                }
                if($new_model->save()){
                    return redirect()->route('admin.show_model', ['table'=>$table::nameTable()]);
                }
            }

        }else{
            abort(404);
        }
    }
}
