<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;    //방법 1,2
use App\Models\Product; //방법 3
use App\Models\Gubun;
use Intervention\Image\ImageManagerStatic as Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	 public function save_row(Request $request, $row)
{
	$request->validate([
        'gubuns_id32' => 'required|numeric',
        'name32' => 'required|max:50',
        'price32' => 'required|numeric'
    ] ,
    [
        'gubuns_id32.required' => '구분명은 필수입니다.',
        'price32.required' => '단가는 필수입력입니다.',
        'name32.required' => '이름은 필수입력입니다.',
        'name32.max' => '50자 이내입니다.'
    ]);

    $row->gubuns_id32 = $request->input("gubuns_id32");
    $row->name32 = $request->input("name32");
    $row->price32 = $request->input("price32");
    $row->jaego32 = $request->input("jaego32");
    
    if ($request->hasFile('pic32'))	         // upload할 파일이 있는 경우
{
    $pic32 = $request->file('pic32');
    $pic_name = $pic32->getClientOriginalName();             // 파일이름
    $pic_size = $pic32->getSize();
    $pic_ext = $pic32->extension();
    $pic32->storeAs('public/product_img', $pic_name);        // 파일저장

    $img = Image::make($pic32)
    ->resize(null, 200, function($constraint) { $constraint->aspectRatio();})
    ->save('storage/product_img/thumb/'.$pic_name);

    $row->pic32 = $pic_name;                     // pic 필드에 파일이름 저장
}

    $row->save();			// 저장
}
function getlist_gubun()
{
  $result=Gubun::orderby('name32')->get();
  return $result;
}



    public function index()
    {
		$data['tmp'] = $this->qstring();
		$text1 = request('text1');		// text1값 알아냄
		$data['text1'] = $text1;

        $data['list'] = $this->getlist($text1);		   // 자료 읽기
		return view( 'product.index', $data ); // 자료 표시(view/product폴더의 index.blade.php)

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


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['list']=$this->getlist_gubun();

		$data['tmp'] = $this->qstring();
        return view('product.create',$data);
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

    $row = new Product; 		// product 모델변수 row 선언
	
	$this->save_row($request, $row);
	return redirect("product".$tmp);
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

        $data['row'] = Product::leftjoin('gubuns', 'products.gubuns_id32', '=', 'gubuns.id')->
        select('products.*', 'gubuns.name32 as gubun_name32')->
            where('products.id', '=', $id)->first();
        return view('product.show', $data);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['list'] = $this->getlist_gubun();

		$data['tmp'] = $this->qstring();
	    $data['row'] = Product::find( $id );	// 자료 찾기
		return view('product.edit', $data );
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

    $row = Product::find($id);	// product 모델변수 row 선언
	$this->save_row($request, $row);
	return redirect("product".$tmp);
	
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

        Product::find( $id )->delete();
		return redirect('product'.$tmp);
    }
	public function qstring()
	{
    $text1 = request("text1") ? request('text1') : "";
    $page = request('page') ? request('page') : "1";
    $tmp = $text1 ? "?text1=$text1&page=$page" : "?page=$page";
    return $tmp;
	}

    public function jaego() {
        DB::statement('drop table if exists temps;');
        DB::statement('create table temps(
            id int not null auto_increment,
            products_id32 int,
            jaego32 int default 0,
            primary key(id));');
        DB::statement('update products set jaego32=0');
        DB::statement('insert into temps (products_id32, jaego32)
            select products_id32, sum(numi32)-sum(numo32) from jangbus
            group by products_id32;');
        DB::statement('update products join temps on products.id = temps.products_id32
            set products.jaego32=temps.jaego32;');

        return redirect('product');
    }
}