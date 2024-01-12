@extends("main_nomenu")
@section("content")


<br>
<div class="alert mycolor1" role="alert">제품선택</div>

<script>
	function find_text() {
		form1.action="{{route('findproduct.index')}}";
		form1.submit();
	}

	function SendProduct(id, name32, price32) {
		opener.form1.products_id32.value = id;
		opener.form1.product_name32.value = name32;
		opener.form1.price32.value = price32;
		opener.form1.prices32.value = Number(price32) * Number(opener.form1.numo32.value);
		self.close();
	}
</script>
		
		<form name="form1" action="" >
			<div class="row">
				<div class="col-6" align="left">      
					<div class="input-group  input-group-sm">
						<span class="input-group-text">이름</span>
						<input type="text" name="text1" value = "{{$text1}}" class="form-control" placeholder="찾을 이름?" onKeydown="if (event.keyCode == 13) { find_text(); }" >
						<button class="btn mycolor1" type="button">검색</button>
					</div>
				</div>
				<div class="col-6" align="right">           

				</div>
			</div>
		</form>

		
		<table class="table  table-bordered  table-sm  table-hover mymargin5">
			<tr class="mycolor2">
				<td width="10%">번호</td>
				<td width="20%">구분명</td>
				<td width="30%">제품명</td>
				<td width="20%">단가</td>
				<td width="20%">재고</td>
			</tr>
			@foreach ($list as $row)
			<tr>
				<td>{{$row->id }}</td>
				<td>{{$row->gubuns_id32 }}</td>
				<td align="left">
					<a href="javascript:SendProduct({{ $row->id }},'{{ $row->name32 }}',{{ $row->price32 }});">{{ $row->name32 }}
				</a>
				</td>
				<td>{{$row->price32 }}</td>
				<td>{{$row->jaego32 }}</td>
			</tr>
			@endforeach
	
		</table>
		<!--
			<nav aria-label="Page navigation example">
			  <ul class="pagination pagination-sm justify-content-center mymargin5">
				<li class="page-item">
				  <a class="page-link" href="#" aria-label="Previous">
					<span aria-hidden="true">&laquo;</span>
				  </a>
				</li>
				<li class="page-item"><a class="page-link" href="#">1</a></li>
				<li class="page-item"><a class="page-link" href="#">2</a></li>
				<li class="page-item"><a class="page-link" href="#">3</a></li>
				<li class="page-item">
				  <a class="page-link" href="#" aria-label="Next">
					<span aria-hidden="true">&raquo;</span>
				  </a>
				</li>
			  </ul>
			</nav>
		-->
		<div class = "row">
			<div class = "col">
				{{ $list->links('mypagination') }}
			</div>
		</div>
<!-- 해야  할 것 : 추가, 수정, paginate 그냥 다 처음부터 다시 -->
@endsection("content")