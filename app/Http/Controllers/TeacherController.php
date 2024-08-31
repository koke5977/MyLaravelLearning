<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Services\CheckFormService;
use App\Http\Requests\StoreTeacherRequest;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // 検索
        $search = $request->search;
        $query = Teacher::query();

        if ($search) {
            $query->where('name', 'like', "%{$search}%");
        }

        $teachers = $query->select('id', 'name', 'created_at')
            ->paginate(20);

        return view('teachers.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeacherRequest $request)
    {
        Teacher::create([
            'name' => $request->name,
        ]);

        return to_route('teachers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $teacher = Teacher::find($id);

        return view('teachers.show', compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $teacher = Teacher::find($id);

        return view('teachers.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreTeacherRequest $request, string $id)
    {
        $teacher = Teacher::find($id);
        $teacher->name = $request->name;
        $teacher->save();

        return to_route('teachers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $teacher = Teacher::find($id);
        $teacher->delete();

        return to_route('teachers.index');
    }
}
