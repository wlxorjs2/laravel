<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;    //방법 1,2
use App\Models\Product; //방법 3
use App\Models\Gubun;

class FindProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	
    public function index()
    {
		$text1 = request('text1');		// text1값 알아냄
		$data['text1'] = $text1;

        $data['list'] = $this->getlist($text1);		   // 자료 읽기
		return view( 'findproduct.index', $data ); // 자료 표시(view/product폴더의 index.blade.php)

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
    $result = Product::leftjoin('gubuns','products.gubuns_id32','=', 'gubuns.id')->
    select('products.*','gubuns.name32 as gubuns_name32')->
    where('products.name32', 'like','%'.$text1.'%')->
    orderby('products.name32','asc')->
    paginate(5)->appends(['text1'=>$text1]);

    return $result;
}
}