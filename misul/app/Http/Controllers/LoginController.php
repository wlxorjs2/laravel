<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Member;
use Illuminate\Validation\Rule;
class LoginController extends Controller
{
    public function save_row(Request $request, $row)
	 {
		 $request->validate([
			'uid' => [
                'sometimes',
                'required',
                'max:20',
                Rule::unique('members')->ignore($row->id),
            ],
			'pwd' => 'required|max:20',
            'pwd2' => 'required|same:pwd',
			'name' => 'required|max:20',
            'email' => 'required|max:50|email:rfc,dns',
            'tel' => 'required|max:11',
		],
		[
			'uid.required'  => '아이디는 필수입력입니다.',
			'pwd.required' => '암호는 필수입력입니다.',
            'pwd2.required' => '암호 재입력은 필수입력입니다.',
			'name.required' => '이름은 필수입력입니다.',
            'email.required' => '이메일은 필수입력입니다.',
            'tel.required' => '전화번호는 필수입력입니다.',
			'uid.max'  => '아이디는 20자 이내입니다.',
			'pwd.max' => '비밀번호는 20자 이내입니다.',
			'name.max' => '이름은 20자 이내입니다.',
            'email.max' => '이메일은 50자 이내입니다.',
            'tel.max' => '전화번호는 11자 이내입니다.',
            'email.email' => '이메일 형식이 잘못되었습니다.',
            'pwd2.same' => '암호가 일치하지 않습니다.',
            'uid.unique' => '이미 사용중인 아이디입니다.'
            
            
		]);
		
		if($request->has('uid')){
            $row->uid=$request->input("uid");
        }
		$row->pwd=$request->input("pwd");
		$row->name=$request->input("name");
        $row->email=$request->input("email");
		$row->tel=$request->input("tel");
		
		$row->save();
        
		
	 }
     public function check(Request $request)
	 {
        $request->validate([
			'uid' => 'required',
			'pwd' => 'required'
		],
		[
			'uid.required'  => '아이디를 입력해주세요.',
			'pwd.required' => '암호를 입력해주세요.'
		]);

		 $uid = request('uid');
		 $pwd = request('pwd');
		 
		 $row = Member::where('uid','=',$uid)->
		 where('pwd','=',$pwd)->first();
		 
		 if($row)
		 {
             session()->put('id',$row->id);
			 session()->put('uid',$row->uid);
             session()->put('pwd',$row->pwd);
             session()->put('name',$row->name);
             session()->put('email',$row->email);
             session()->put('tel',$row->tel);
			 session()->put('rank',$row->rank);
             session()->put('created_at',$row->created_at);
             return redirect()->intended('/');
		 }
         else
         {
            return redirect()->route('login.index')->with('fail', '아이디나 비밀번호가 틀렸습니다.');
         }
		 
	 }
	 
	 public function logout()
	 {
         session()->forget('id');
		 session()->forget('uid');
         session()->forget('pwd');
         session()->forget('name');
         session()->forget('email');
         session()->forget('tel');
		 session()->forget('rank');
         session()->forget('created_at');
		 
		 return redirect()->back();
	 }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(url()->previous() != url()->current()){
        session()->put('url.intended', url()->previous());
        }
        return view("login.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("login.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $row=new Member;
		$this->save_row($request, $row);
        return view('login.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $logincheck = session()->get('id');

        if ($logincheck != $id) {
            return redirect('/');
        }

        $data['row'] = Member::where('id','=',$id)->first();
		return view('login.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $row=Member::find($id);
        $this->save_row($request,$row);
        session()->put('name',$row->name);
        session()->put('pwd',$row->pwd);
        session()->put('email',$row->email);
        session()->put('tel',$row->tel);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    
}

