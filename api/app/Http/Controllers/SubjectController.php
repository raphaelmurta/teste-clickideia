<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:api', 'role:professor']);
    }

    public function index()
    {
        return response()->json(Subject::all());
    }

    public function store(Request $request)
    {
        $subject = Subject::create($request->all());
        return response()->json($subject, 201);
    }
}
