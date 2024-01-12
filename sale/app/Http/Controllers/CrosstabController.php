<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;    //방법 1,2
use App\Models\Product; //방법 3
use App\Models\Jangbu;

class CrosstabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {

		$text1 = $request->input('text1');		// text1값 알아냄
        if(!$text1) $text1 = date("Y");

		$data['text1'] = $text1;
        $data['list'] = $this->getlist($text1);		   // 자료 읽기

		return view( 'crosstab.index', $data ); // 자료 표시(view/product폴더의 index.blade.php)
    }

	public function getlist($text1) {	
        $result = Jangbu::leftjoin('products','jangbus.products_id32','=', 'products.id')->
            select('products.name32 as product_name32',
            DB::raw('sum( if(month(jangbus.writeday32)=1, jangbus.numo32,0) ) as s1,
                     sum( if(month(jangbus.writeday32)=2, jangbus.numo32,0) ) as s2,
                     sum( if(month(jangbus.writeday32)=3, jangbus.numo32,0) ) as s3,
                     sum( if(month(jangbus.writeday32)=4, jangbus.numo32,0) ) as s4,
                     sum( if(month(jangbus.writeday32)=5, jangbus.numo32,0) ) as s5,
                     sum( if(month(jangbus.writeday32)=6, jangbus.numo32,0) ) as s6,
                     sum( if(month(jangbus.writeday32)=7, jangbus.numo32,0) ) as s7,
                     sum( if(month(jangbus.writeday32)=8, jangbus.numo32,0) ) as s8,
                     sum( if(month(jangbus.writeday32)=9, jangbus.numo32,0) ) as s9,
                     sum( if(month(jangbus.writeday32)=10, jangbus.numo32,0) ) as s10,
                     sum( if(month(jangbus.writeday32)=11, jangbus.numo32,0) ) as s11,
                     sum( if(month(jangbus.writeday32)=12, jangbus.numo32,0) ) as s12'))->
                     where(DB::raw('year(jangbus.writeday32)'), '=', $text1)->
                     where('jangbus.io32', '=', 1)->
                     orderby('products.name32')->
                     groupby('products.name32')->
                     paginate(5)->appends( $text1 );
                 
        return $result;
    }
    function getlist_product() {
      $result=Product::orderby('name32')->get();
      return $result;
    }
}