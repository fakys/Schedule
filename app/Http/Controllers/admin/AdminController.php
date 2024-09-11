<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\LessonFormat;
use App\Models\Speciality;
use App\Models\StudentGroup;
use App\Models\Teacher;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $teachers = Teacher::all();
        $student_groups = StudentGroup::all();
        $specialities = Speciality::all();
        $lessons = Lesson::all();
        $lesson_formats= LessonFormat::all();
        return view('admin.index', compact('teachers', 'student_groups', 'specialities', 'lessons', 'lesson_formats'));
    }
}
