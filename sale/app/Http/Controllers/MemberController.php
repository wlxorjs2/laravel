<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;    //방법 1,2
use App\Models\Member; //방법 3

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	 public function save_row(Request $request, $row)
{
	$request->validate([
        'uid32' => 'required|max:20',
        'pwd32' => 'required|max:20',
        'name32' => 'required|max:20',
    ] ,
    [
        'uid32.required'  => '아이디는 필수입력입니다.',
        'pwd32.required' => '암호는 필수입력입니다.',
        'name32.required' => '이름은 필수입력입니다.',
        'uid32.max'  => '20자 이내입니다.',
        'pwd32.max' => '20자 이내입니다.',
        'name32.max' => '20자 이내입니다.',
    ]);

    $tel1= $request->input("tel1");
    $tel2= $request->input("tel2");
    $tel3= $request->input("tel3");
    $tel32 = sprintf("%-3s%-4s%-4s", $tel1, $tel2, $tel3);	// 전화번호 합치기


    
    $row->uid32 = $request->input("uid32");	// 값 입력
    $row->pwd32 = $request->input("pwd32");
    $row->name32 = $request->input("name32");
    $row->tel32 = $tel32;
    $row->rank32 = $request->input("rank32");
    $row->save();			// 저장
}

    public function index()
    {
        if(session()->get("rank32")!=1) return redirect("/");
		$data['tmp'] = $this->qstring();
		$text1 = request('text1');		// text1값 알아냄
		$data['text1'] = $text1;

        $data['list'] = $this->getlist($text1);		   // 자료 읽기
		return view( 'member.index', $data ); // 자료 표시(view/member폴더의 index.blade.php)

    }
	
	public function getlist($text1)
{	
	//방법 1
	//$sql = 'select * from members order by name32'; 
    //return DB::select($sql);                
    //$result = DB::select($sql);

	//방법 2
	//$result = DB::table('member')->orderby('name')->get();   

	//방법 3
    $result = Member::where('name32','like','%'.$text1.'%')
    ->orderby('name32','asc')
    ->paginate(5)->appends(['text1'=>$text1]);

    return $result;
}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$data['tmp'] = $this->qstring();
        return view('member.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
public function store(Request $request) 	// Eloquent ORM을 이용하는 경우
{
	$tmp = $this->qstring();

    $row = new Member; 		// member 모델변수 row 선언
	
	$this->save_row($request, $row);
	return redirect("member".$tmp);
}


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		$data['tmp'] = $this->qstring();
        $data['row'] = Member::find( $id );
		return view('member.show', $data );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$data['tmp'] = $this->qstring();
	    $data['row'] = Member::find( $id );	// 자료 찾기
		return view('member.edit', $data );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
	$tmp = $this->qstring();

    $row = Member::find($id);	// member 모델변수 row 선언
	$this->save_row($request, $row);
	return redirect("member".$tmp);
	
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$tmp = $this->qstring();

        Member::find( $id )->delete();
		return redirect('member'.$tmp);
    }
	public function qstring()
	{
    $text1 = request("text1") ? request('text1') : "";
    $page = request('page') ? request('page') : "1";
    $tmp = $text1 ? "?text1=$text1&page=$page" : "?page=$page";
    return $tmp;
	}
}