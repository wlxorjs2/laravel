<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;    //방법 1,2
use App\Models\Gubun; //방법 3
use Response;

class AjaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	 public function save_row(Request $request, $row)
{
	$request->validate([
        'name32' => 'required|max:20'
    ] ,
    [
        'name32.required' => '이름은 필수입력입니다.',
        'name32.max' => '20자 이내입니다.'
    ]);

    $row->name32 = $request->input("name32");

    $row->save();			// 저장
}


    public function index()
    {
		$data['tmp'] = $this->qstring();
		$text1 = request('text1');		// text1값 알아냄
		$data['text1'] = $text1;

        $data['list'] = $this->getlist($text1);		   // 자료 읽기
		return view( 'ajax.index', $data ); // 자료 표시(view/gubun폴더의 index.blade.php)

    }
	
	public function getlist($text1)
{	
	//방법 1
	//$sql = 'select * from gubuns order by name32'; 
    //return DB::select($sql);                
    //$result = DB::select($sql);

	//방법 2
	//$result = DB::table('gubun')->orderby('name')->get();   

	//방법 3
    $result = Gubun::where('name32','like','%'.$text1.'%')->orderby('name32','asc')->paginate(5)->appends(['text1'=>$text1]);

    return $result;
}

public function store(Request $request) 	// Eloquent ORM을 이용하는 경우
{
	$tmp = $this->qstring();

    $row = new Gubun; 		// gubun 모델변수 row 선언
	
	$this->save_row($request, $row);
	return response()->json($row);
}


    public function update(Request $request, $id)
    {
    $row = Gubun::find($id);	// gubun 모델변수 row 선언
	$this->save_row($request, $row);
    }

    public function destroy($id)
    {
        Gubun::find( $id )->delete();
    }
	public function qstring()
	{
    $text1 = request("text1") ? request('text1') : "";
    $page = request('page') ? request('page') : "1";
    $tmp = $text1 ? "?text1=$text1&page=$page" : "?page=$page";
    return $tmp;
	}
}