<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\History;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $histories = History::all();

        return view('histories.index', compact('histories'));
    }

    public function destroy()
    {
        History::query()->delete();

        return to_route('histories.index');
    }
}
