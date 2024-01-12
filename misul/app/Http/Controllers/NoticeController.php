<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Notice;

class NoticeController extends Controller
{
    public function save_row(Request $request, $row) {
        $request->validate([
            'title' => 'required|max:50',
            'posting' => 'required|max:500'
        ] ,
        [
            'title.required' => '제목은 필수입력입니다.',
            'posting.max' => '500자 이내로 작성해주세요.'
        ]);

        $row->title = $request->input("title");
        $row->posting = $request->input("posting");
        $row->writeday = $request->input("writeday");
        
        $row->save();   
    }

    public function index(Request $request)
    {
        $query = Notice::orderBy('writeday', 'desc');
    
        if ($request->has('title')) {
            $query->where('title', 'like', '%'.$request->title.'%');
        }
    
        $notices = $query->paginate(10);
    
        return view('notice.index', compact('notices'));
    }
    
    public function create() {
        return view('notice.create');
    }

    public function store(Request $request) {
        $notice = new Notice;
        $this->save_row($request, $notice);
        return redirect()->route('notice.index');
    }

    public function edit(string $id) {
        $notice = Notice::find($id);
        return view('notice.edit', compact('notice'));
    }

    public function show(string $id)
    {
        $notice = Notice::find($id);
        return view('notice.show', compact('notice'));
    }

    public function update(Request $request, string $id) {
        $notice = Notice::find($id);
        $this->save_row($request, $notice);
        return redirect()->route('notice.index');
    }

    public function destroy(string $id) {
        Notice::find($id)->delete();
        return redirect()->route('notice.index');
    }
}