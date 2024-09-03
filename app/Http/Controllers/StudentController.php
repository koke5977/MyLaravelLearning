<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Services\CheckFormService;
use App\Http\Requests\StoreStudentRequest;
use App\Services\StudentService;

class StudentController extends Controller
{
    protected $studentService;

    public function __construct(StudentService $studentService)
    {
        $this->studentService = $studentService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // 検索
        $search = $request->search;
        $query = Student::query();

        if ($search) {
            $query->where('name', 'like', "%{$search}%");
        }

        $students = $query->select('id', 'name', 'created_at')
            ->paginate(20);

        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        Student::create([
            'name' => $request->name,
        ]);

        return to_route('students.index');
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    //     $student = Student::find($id);

    //     return view('students.show', compact('student'));
    // }
    public function show(string $id)
    {
        $student = $this->studentService->getStudent($id);
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Student::find($id);

        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreStudentRequest $request, string $id)
    {
        $student = Student::find($id);
        $student->name = $request->name;
        $student->save();

        return to_route('students.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::find($id);
        $student->delete();

        return to_route('students.index');
    }
}
