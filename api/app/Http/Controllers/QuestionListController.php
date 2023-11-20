<?php

namespace App\Http\Controllers;

use App\Models\QuestionList;
use Illuminate\Http\Request;

class QuestionListController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:api', 'role:professor']);
    }

    public function store(Request $request)
    {
        $list = QuestionList::create($request->all());
        return response()->json($list, 201);
    }

    public function index(Request $request)
    {
        $lists = QuestionList::where('is_public', true)
            ->orWhere('user_id', $request->user()->id)
            ->get();
        return response()->json($lists);
    }

}
