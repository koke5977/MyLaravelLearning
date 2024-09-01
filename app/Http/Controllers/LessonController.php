<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Http\Request;
use App\Http\Requests\StoreLessonRequest;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\History;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Lesson::query()
            ->join('students', 'lessons.student_id', '=', 'students.id')
            ->join('subjects', 'lessons.subject_id', '=', 'subjects.id')
            ->join('teachers', 'lessons.teacher_id', '=', 'teachers.id')
            ->select(
                'lessons.id as id',
                'lessons.created_at as created_at',
                'students.name as student_name',
                'subjects.name as subject_name',
                'teachers.name as teacher_name'
            );

        $lessons = $query->get();

        return view('lessons.index', compact('lessons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Student::all(); // 生徒の一覧を取得
        $subjects = Subject::all(); // 科目の一覧を取得
        $teachers = Teacher::all(); // 教師の一覧を取得

        return view('lessons.create', compact('students', 'subjects', 'teachers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLessonRequest $request)
    {
        Lesson::create([
            'student_id' => $request->student,
            'subject_id' => $request->subject,
            'teacher_id' => $request->teacher,
        ]);

        return to_route('lessons.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $lesson = Lesson::query()
            ->join('students', 'lessons.student_id', '=', 'students.id')
            ->join('subjects', 'lessons.subject_id', '=', 'subjects.id')
            ->join('teachers', 'lessons.teacher_id', '=', 'teachers.id')
            ->select(
                'lessons.id',
                'lessons.created_at',
                'students.name as student_name',
                'subjects.name as subject_name',
                'teachers.name as teacher_name'
            )
            ->where('lessons.id', $id)
            ->firstOrFail();

        return view('lessons.show', compact('lesson'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $lesson = Lesson::find($id);
        $students = Student::all(); // 生徒の一覧を取得
        $subjects = Subject::all(); // 科目の一覧を取得
        $teachers = Teacher::all(); // 教師の一覧を取得

        return view('lessons.edit', compact('lesson', 'students', 'subjects', 'teachers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreLessonRequest $request, string $id)
    {
        $lesson = Lesson::find($id);
        $lesson->student_id = $request->student;
        $lesson->subject_id = $request->subject;
        $lesson->teacher_id = $request->teacher;
        $lesson->save();

        return to_route('lessons.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $lesson = Lesson::query()
            ->join('students', 'lessons.student_id', '=', 'students.id')
            ->join('subjects', 'lessons.subject_id', '=', 'subjects.id')
            ->join('teachers', 'lessons.teacher_id', '=', 'teachers.id')
            ->select(
                'lessons.id',
                'students.name as student_name',
                'subjects.name as subject_name',
                'teachers.name as teacher_name'
            )
            ->where('lessons.id', $id)
            ->firstOrFail();

        History::create([
            'student' => $lesson->student_name,
            'subject' => $lesson->subject_name,
            'teacher' => $lesson->teacher_name,
        ]);

        $lesson->delete();

        return to_route('lessons.index');
    }
}
