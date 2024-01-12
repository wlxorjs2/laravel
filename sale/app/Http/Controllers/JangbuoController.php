<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;    //방법 1,2
use App\Models\Product; //방법 3
use App\Models\Jangbu;

class JangbuoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	 public function save_row(Request $request, $row)
{
	$request->validate([
        'writeday32' => 'required|date',
        'products_id32' => 'required'
    ] ,
    [
        'writeday32.required' => '날짜는 필수 입력입니다.',
        'products_id32.required' => '제품명은 필수입력입니다.',
        'writeday32.date' => '날짜형식이 잘못되었습니다.'
    ]);

    $row->io32 = 1;
    $row->writeday32 = $request->input("writeday32");
    $row->products_id32 = $request->input("products_id32");
    $row->price32 = $request->input("price32");
    $row->numi32 = 0;
    $row->numo32 = $request->input("numo32");
    $row->prices32 = $request->input("prices32");
    $row->bigo32 = $request->input("bigo32");

    $row->save();			// 저장
}
function getlist_product()
{
  $result=Product::orderby('name32')->get();
  return $result;
}



    public function index()
    {
		$data['tmp'] = $this->qstring();
		$text1 = request('text1');		// text1값 알아냄
        if(!$text1) $text1 = date("Y-m-d");

		$data['text1'] = $text1;
        $data['list'] = $this->getlist($text1);		   // 자료 읽기
		return view( 'jangbuo.index', $data ); // 자료 표시(view/product폴더의 index.blade.php)

    }
	
	public function getlist($text1)
{	
	//방법 1
	//$sql = 'select * from products order by name32'; 
    //return DB::select($sql);                
    //$result = DB::select($sql);

	//방법 2
	//$result = DB::table('product')->orderby('name')->get();   

	//방법 3
    $result = Jangbu::leftjoin('products','jangbus.products_id32','=', 'products.id')->
        select('jangbus.*','products.name32 as product_name32')->
            where('jangbus.io32', '=',1)->
            where('jangbus.writeday32','=',$text1)->
            orderby('jangbus.id','desc')->
            paginate(5)->appends(['text1'=>$text1]);

    return $result;
}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['list']=$this->getlist_product();

		$data['tmp'] = $this->qstring();
        return view('jangbuo.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
public function store(Request $request) 	// Eloquent ORM을 이용하는 경우
{
    $row = new Jangbu; 		// product 모델변수 row 선언
	$this->save_row($request, $row);

    $tmp = $this->qstring();
	return redirect("jangbuo".$tmp);
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

        $data['row'] = Jangbu::leftjoin('products', 'jangbus.products_id32', '=', 'products.id')->
        select('jangbus.*', 'products.name32 as product_name32')->
            where('jangbus.id', '=', $id)->first();
        return view('jangbuo.show', $data);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['list'] = $this->getlist_product();

		$data['tmp'] = $this->qstring();
	    $data['row'] = Jangbu::leftjoin('products', 'jangbus.products_id32', '=', 'products.id')->
        select('jangbus.*','products.name32 as product_name32')->
        where('jangbus.id','=', $id)->first();	// 자료 찾기
		return view('jangbuo.edit', $data );
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

    $row = Jangbu::find($id);	// product 모델변수 row 선언
	$this->save_row($request, $row);
	return redirect("jangbuo".$tmp);
	
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

        Jangbu::find( $id )->delete();
		return redirect('jangbuo'.$tmp);
    }
	public function qstring()
	{
    $text1 = request("text1") ? request('text1') : "";
    $page = request('page') ? request('page') : "1";
    $tmp = $text1 ? "?text1=$text1&page=$page" : "?page=$page";
    return $tmp;
	}
}