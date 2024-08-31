<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use App\Services\CheckFormService;
use App\Http\Requests\StoreSubjectRequest;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // 検索
        $search = $request->search;
        $query = Subject::query();

        if ($search) {
            $query->where('name', 'like', "%{$search}%");
        }

        $subjects = $query->select('id', 'name', 'created_at')
            ->paginate(20);

        return view('subjects.index', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('subjects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubjectRequest $request)
    {
        Subject::create([
            'name' => $request->name,
        ]);

        return to_route('subjects.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $subject = Subject::find($id);

        return view('subjects.show', compact('subject'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $subject = Subject::find($id);

        return view('subjects.edit', compact('subject'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreSubjectRequest $request, string $id)
    {
        $subject = Subject::find($id);
        $subject->name = $request->name;
        $subject->save();

        return to_route('subjects.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subject = Subject::find($id);
        $subject->delete();

        return to_route('subjects.index');
    }
}
