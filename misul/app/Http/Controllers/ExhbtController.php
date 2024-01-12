<?php

namespace App\Http\Controllers;
// php artisan make:controller --resource MemberController 명령어로 생성된 파일
use Illuminate\Support\Facades\DB;    // DB 클래스 사용
use App\Models\Exhbt;	      // Eloquent ORM



use Illuminate\Http\Request;

class ExhbtController extends Controller
{
	public function qstring()
	{
    $text1 = request("text1") ? request('text1') : "";
    $page = request('page') ? request('page') : "1";
    $tmp = $text1 ? "?text1=$text1&page=$page" : "?page=$page";
    return $tmp;
	}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$data['tmp'] = $this->qstring();
		
		$text1 = request('text1');		// <!-- 1추가한부분--> // text1값 알아냄 
		$data['text1'] = $text1;         // // <!-- 1추가한부분-->
        $data['list'] = $this->getlist($text1);		// <!-- 1추가한부분(마지막에 괄호안 텍스트1만) -->자료 읽기
        return view( 'exhbt.index', $data );	// 자료 표시(view/member폴더의 index.blade.php)
    }

    public function getlist($text1) // <!-- 1추가한부분(마지막 괄호안 텍스트1만)-->
{
    // $sql = 'select * from members order by name';                     // Raw Query
    //      $result = DB::select($sql);

    // $result = DB::table('member')->orderby('name')->get();            // Query Builder

    $result = Exhbt::where('exhbtname', 'like', '%' . $text1 . '%')->orderby('exhbtname','asc')->paginate(5)->appends( ['text1' => $text1] );

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
        return view( 'exhbt.create', $data );
    }
	
	


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
	 
	public function store(Request $request)
{
    $tmp = $this->qstring();
    $row = new Exhbt;

    $this->save_row($request, $row);

    return redirect('exhbt' . $tmp);
}


	 
	
	
	public function save_row(Request $request, $row)
{
     $request->validate( [

            'exhbtname' => 'required|max:20',
        ] ,
        [
            
            'exhbtname.required' => '이름은 필수입력입니다.',
            'exhbtname.max' => '20자 이내입니다.',
			
			
        ] );
		
			
			$row->exhbtbigname = $request->input("exhbtbigname");
			$row->exhbtname = $request->input("exhbtname");
			$row->exhbtdate = $request->input("exhbtdate");
			$row->exhbtex = $request->input("exhbtex");
			$row->jijeom = $request->input("jijeom");
			

if ($request->hasFile('exhbtexpic'))	         // upload할 파일이 있는 경우
            {
                $pic = $request->file('exhbtexpic');
                $pic_name = $pic->getClientOriginalName();             // 파일이름
                $pic->storeAs('public/product_img', $pic_name);        // 파일저장
                $row->exhbtexpic = $pic_name;                     // pic 필드에 파일이름 저장
            }

			
			$row->save();			// 저장
		
	}
			// return redirect('exhbt');		// 목록화면으로 이동  

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	 
	 
    public function show($id)
    {
		$data['tmp'] = $this->qstring();
        $data['row'] = Exhbt::find( $id );                      // Eloquent ORM
		return view('exhbt.show', $data );
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
		
        $data['row'] = Exhbt::find( $id );	// 자료 찾기
        return view('exhbt.edit', $data );	// 수정화면 호출
    

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
		$row= Exhbt::find($id);

		$this->save_row($request, $row); 
		return redirect('exhbt'.$tmp);
		
	}

	
	

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
	
		public function destroy($id)
	{
		Exhbt::find($id)->delete();
		$tmp = $this->qstring();
		return redirect()->route('exhbt.index', $tmp);
	}

	
	
}



