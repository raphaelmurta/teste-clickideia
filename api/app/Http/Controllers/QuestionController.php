<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:api', 'role:professor']);
    }

    public function store(Request $request)
    {
        $question = Question::create($request->all());
        return response()->json($question, 201);
    }

    public function index()
    {
        $questions = Question::all();
        return response()->json($questions);
    }

    public function destroy(Question $question)
    {
        $question->delete();
        return response()->json(null, 204);
    }
}
