<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    // --- ADMIN ---
    public function index()
    {
        return Exam::all();
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'date' => 'required|date',
            'user_id' => 'required|exists:users,id',
        ]);

        return Exam::create($request->all());
    }
    public function show(Exam $exam)
    {
        return $exam;
    }
    public function update(Request $request, Exam $exam)
    {
        $exam->update($request->all());
        return $exam;
    }
    public function destroy(Exam $exam)
    {
        $exam->delete();
        return response()->json(['message' => 'Deleted']);
    }

    // --- SUPERVISOR ---
    public function assignVote(Request $request, Exam $exam)
    {
        $request->validate(['vote' => 'required|integer|min:18|max:30']);
        $exam->vote = $request->vote;
        $exam->save();
        return $exam;
    }

    // --- USER ---
    public function myExams()
    {
        return auth()->user()->exams;
    }
}
