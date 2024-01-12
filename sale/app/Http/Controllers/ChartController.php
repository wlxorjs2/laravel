<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;    //방법 1,2
use App\Models\Product; //방법 3
use App\Models\Jangbu;

class ChartController extends Controller
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
        $list = $this->getlist($text1,$text2);		   // 자료 읽기

        $str_label = "";
        $str_data = "";
        foreach ($list as $row) {
            $str_label .= "'$row->gubuns_name32',";
            $str_data .= $row->cnumo.',';
        }
        $data["list"] = $list;
        $data["str_label"] = $str_label;
        $data["str_data"] = $str_data;

		return view('chart.index', $data ); // 자료 표시(view/product폴더의 index.blade.php)
    }

	public function getlist($text1,$text2) {	
        $result = Jangbu::leftjoin('products','jangbus.products_id32','=', 'products.id')->
        leftjoin('gubuns','products.gubuns_id32','=','gubuns.id')->
            select('gubuns.name32 as gubuns_name32',DB::raw('count(jangbus.numo32) as cnumo'))->
            wherebetween('jangbus.writeday32',array($text1,$text2))->
            where('jangbus.io32','=',1)->
            orderby('cnumo','desc')->
            groupby('gubuns.name32')->
            paginate(14)->appends(['text1' => $text1, 'text2' => $text2]);
        return $result;
    }
    function getlist_product() {
      $result=Product::orderby('name32')->get();
      return $result;
    }
}