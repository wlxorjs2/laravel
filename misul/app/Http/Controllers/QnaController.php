<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\UsageGuide;

class QnaController extends Controller
{
    public function save_row(Request $request, $row) {
        $request->validate([
            'question' => 'required|max:50',
            'answer' => 'required|max:200'
        ] ,
        [
            'question.required' => '제목은 필수입력입니다.',
            'answer.max' => '200자 이내로 작성해주세요.'
        ]);

        $row->question = $request->input("question");
        $row->answer = $request->input("answer");
        
        $row->save();   
    }

    public function index(Request $request)
    {
        $query = UsageGuide::orderBy('question', 'desc');
    
        if ($request->has('question')) {
            $query->where('question', 'like', '%'.$request->question.'%');
        }
    
        $qnas = $query->paginate(10);
    
        return view('qna.index', compact('qnas'));
    }
    
    public function create() {
        return view('qna.create');
    }

    public function store(Request $request) {
        $qna = new UsageGuide;
        $this->save_row($request, $qna);
        return redirect()->route('qna.index');
    }

    public function edit(string $id) {
        $qna = UsageGuide::find($id);
        return view('qna.edit', compact('qna'));
    }

    public function show(string $id)
    {
        $qna = UsageGuide::find($id);
        return view('qna.show', compact('qna'));
    }

    public function update(Request $request, string $id) {
        $qna = UsageGuide::find($id);
        $this->save_row($request, $qna);
        return redirect()->route('qna.index');
    }

    public function destroy(string $id) {
        UsageGuide::find($id)->delete();
        return redirect()->route('qna.index');
    }
}