<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;    //방법 1,2
use App\Models\Product; //방법 3
use App\Models\Jangbu;

class BestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {

		$text1 = $request->input('text1');		// text1값 알아냄
        if(!$text1) $text1 = date("Y-m-d", strtotime("-1 month"));

        $text2 = $request->input('text2');		// text1값 알아냄
        if(!$text2) $text2 = date("Y-m-d");

		$data['text1'] = $text1;
        $data['text2'] = $text2;

        $data['list'] = $this->getlist($text1,$text2);		   // 자료 읽기

		return view( 'best.index', $data ); // 자료 표시(view/product폴더의 index.blade.php)
    }

	public function getlist($text1,$text2) {	
        $result = Jangbu::leftjoin('products','jangbus.products_id32','=', 'products.id')->
            select('products.name32 as product_name32',DB::raw('count(jangbus.numo32) as cnumo'))->
            wherebetween('jangbus.writeday32',array($text1,$text2))->
            where('jangbus.io32','=',1)->
            orderby('cnumo','desc')->
            groupby('products.name32')->
            paginate(5)->appends(['text1' => $text1, 'text2' => $text2]);
        return $result;
    }
    function getlist_product() {
      $result=Product::orderby('name32')->get();
      return $result;
    }
}